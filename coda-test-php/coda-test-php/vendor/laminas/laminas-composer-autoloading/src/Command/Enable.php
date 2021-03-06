<?php

/**
 * @see       https://github.com/laminas/laminas-composer-autoloading for the canonical source repository
 * @copyright https://github.com/laminas/laminas-composer-autoloading/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-composer-autoloading/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\ComposerAutoloading\Command;

use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function preg_match;
use function preg_replace;
use function sprintf;
use function unlink;

class Enable extends AbstractCommand
{
    /** @var bool */
    private $moveModuleClass = true;

    /** @var null|string[] */
    private $movedModuleClass;

    /**
     * Update composer.json autoloading rules.
     *
     * Writes new rules to composer.json, and executes composer dump-autoload.
     *
     * {@inheritdoc}
     *
     * @return ((mixed|string[])[]|mixed)[]|false
     * @psalm-return array{autoload: array<string, array<string, string>|mixed>|mixed}|false
     */
    protected function execute()
    {
        if ($this->autoloadingRulesExist()) {
            return false;
        }

        if ($this->moveModuleClass) {
            $this->moveModuleClassFile();
        }

        $composerPackage = $this->composerPackage;
        $type            = $this->type;
        $module          = $this->moduleName;

        $composerPackage['autoload'][$type][$module . '\\'] = sprintf('%s/%s/src/', $this->modulesPath, $module);

        return $composerPackage;
    }

    /**
     * Moves the Module class file under the src tree, if necessary.
     *
     * @return void
     */
    private function moveModuleClassFile()
    {
        $moduleClassFile = sprintf('%s/Module.php', $this->modulePath);
        if (! file_exists($moduleClassFile)) {
            return;
        }

        $moduleClassContents = file_get_contents($moduleClassFile);
        if (! preg_match('/\bclass Module\b/', $moduleClassContents)) {
            return;
        }

        $srcModuleClassFile = sprintf('%s/src/Module.php', $this->modulePath);
        if (file_exists($srcModuleClassFile)) {
            return;
        }

        $moduleClassContents = preg_replace('#(__DIR__ \. \')(/config/)#', '$1/..$2', $moduleClassContents);
        file_put_contents($srcModuleClassFile, $moduleClassContents);
        unlink($moduleClassFile);

        $this->movedModuleClass = [$moduleClassFile => $srcModuleClassFile];
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function setMoveModuleClass($value)
    {
        $this->moveModuleClass = (bool) $value;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getMovedModuleClass()
    {
        return $this->movedModuleClass;
    }
}
