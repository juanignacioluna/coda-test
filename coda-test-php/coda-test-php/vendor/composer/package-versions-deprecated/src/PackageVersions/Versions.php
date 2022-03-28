<?php

declare(strict_types=1);

namespace PackageVersions;

use Composer\InstalledVersions;
use OutOfBoundsException;

class_exists(InstalledVersions::class);

/**
 * This class is generated by composer/package-versions-deprecated, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 *
 * @deprecated in favor of the Composer\InstalledVersions class provided by Composer 2. Require composer-runtime-api:^2 to ensure it is present.
 */
final class Versions
{
    /**
     * @deprecated please use {@see self::rootPackageName()} instead.
     *             This constant will be removed in version 2.0.0.
     */
    const ROOT_PACKAGE_NAME = 'agencycoda/mezzio-skeleton';

    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    const VERSIONS          = array (
  'agencycoda/mia-auth-mezzio' => 'dev-main@6e10e0b4aae0f3866d7f3c2ace1bf443455a9fad',
  'agencycoda/mia-core-mezzio' => 'dev-main@1f77b345ae6f3f88492dd81b9c92cdc6c61813a2',
  'agencycoda/mia-eloquent-mezzio' => 'dev-main@ad737166a790ceaf6855c80425ca3c226fb7c2f5',
  'agencycoda/mia-installer-mezzio' => 'dev-main@a508e96108eb9ee0efe0fccbe0f4e83d264a1ce5',
  'agencycoda/mia-mail-mezzio' => 'dev-main@04c52d45982850a59dc5f27c21e2d2d3903cd17a',
  'brick/varexporter' => '0.3.5@05241f28dfcba2b51b11e2d750e296316ebbe518',
  'composer/package-versions-deprecated' => '1.11.99.2@c6522afe5540d5fc46675043d3ed5a45a740b27c',
  'container-interop/container-interop' => '1.2.0@79cbf1341c22ec75643d841642dd5d6acd83bdb8',
  'doctrine/annotations' => '1.13.1@e6e7b7d5b45a2f2abc5460cc6396480b2b1d321f',
  'doctrine/inflector' => '2.0.3@9cf661f4eb38f7c881cac67c75ea9b00bf97b210',
  'doctrine/lexer' => '1.2.1@e864bbf5904cb8f5bb334f99209b48018522f042',
  'fig/http-message-util' => '1.1.5@9d94dc0154230ac39e5bf89398b324a86f63f765',
  'firebase/php-jwt' => 'v5.2.1@f42c9110abe98dd6cfe9053c49bc86acc70b2d23',
  'giggsey/libphonenumber-for-php' => '8.12.28@f503d56d269e9b8572440820ef029e296dadaa1e',
  'giggsey/locale' => '1.9@b07f1eace8072ccc61445ad8fbd493ff9d783043',
  'google/auth' => 'v1.16.0@c747738d2dd450f541f09f26510198fbedd1c8a0',
  'google/cloud-core' => 'v1.42.2@f3fff3ca4af92c87eb824e5c98aaf003523204a2',
  'google/cloud-error-reporting' => 'v0.18.3@54d4615fce1fde0f4b37ba81e174f6d7f6da3d10',
  'google/cloud-logging' => 'v1.21.1@a972f22eaf6f484e21438c12fae2afbc121e78e7',
  'google/cloud-storage' => 'v1.24.1@440e195a11dbb9a6a98818dc78ba09857fbf7ebd',
  'google/cloud-tasks' => 'v1.9.1@7dda80965d679c60b3403f14e8e34c690b8cac4f',
  'google/common-protos' => '1.3.1@c348d1545fbeac7df3c101fdc687aba35f49811f',
  'google/crc32' => 'v0.1.0@a8525f0dea6fca1893e1bae2f6e804c5f7d007fb',
  'google/gax' => 'v1.7.1@48cd41dbea7b8fece8c41100022786d149de64ca',
  'google/grpc-gcp' => '0.1.5@bb9bdbf62f6ae4e73d5209d85b1d0a0b9855ff36',
  'google/protobuf' => 'v3.17.3@ae9282cf11dd2933b7e71a611f9590f07d53d3f3',
  'grpc/grpc' => '1.39.0@101485614283d1ecb6b2ad1d5b95dc82495931db',
  'guzzlehttp/guzzle' => '7.3.0@7008573787b430c1c1f650e3722d9bba59967628',
  'guzzlehttp/promises' => '1.4.1@8e7d04f1f6450fef59366c399cfad4b9383aa30d',
  'guzzlehttp/psr7' => '1.8.2@dc960a912984efb74d0a90222870c72c87f10c91',
  'illuminate/collections' => 'v8.51.0@7942bc71aca503d2f2721469c650fce38b1058e3',
  'illuminate/container' => 'v8.51.0@382959676d85583f0e8fdd248bceb4b8762dc1ed',
  'illuminate/contracts' => 'v8.51.0@199fcedc161ba4a0b83feaddc4629f395dbf1641',
  'illuminate/database' => 'v8.51.0@29b68195c967ad7233237387deffaf16570423c8',
  'illuminate/filesystem' => 'v8.51.0@f33219e5550f8f280169e933b91a95250920de06',
  'illuminate/macroable' => 'v8.51.0@300aa13c086f25116b5f3cde3ca54ff5c822fb05',
  'illuminate/pagination' => 'v8.51.0@27eee63808e3c22f6df443c36e51af00ca09ee66',
  'illuminate/support' => 'v8.51.0@ee397b851a411ad490363a47df7476a24f93ca2e',
  'kreait/clock' => '1.1.0@8f1fbc252e4e81298ae7c520597c25e9a6a0f454',
  'kreait/firebase-php' => '5.14.1@5504ea4d0fb33565180634c56a41dd48c9f95ca5',
  'kreait/firebase-tokens' => '1.15.0@b39d7c3a78d0912c9a617cd42d4bd356209b1b91',
  'laminas/laminas-code' => '3.5.1@b549b70c0bb6e935d497f84f750c82653326ac77',
  'laminas/laminas-component-installer' => '2.5.0@223d81cf648ff9380bd13cfe07a31324b0ffc8b8',
  'laminas/laminas-config-aggregator' => '1.5.0@c5908c265ada01c8952baf84f102a073de30947f',
  'laminas/laminas-crypt' => '3.4.0@a058eeb2fe57824b958ac56753faff790a649e18',
  'laminas/laminas-diactoros' => '2.6.0@7d2034110ae18afe05050b796a3ee4b3fe177876',
  'laminas/laminas-escaper' => '2.8.0@2d6dce99668b413610e9544183fa10392437f542',
  'laminas/laminas-eventmanager' => '3.3.1@966c859b67867b179fde1eff0cd38df51472ce4a',
  'laminas/laminas-httphandlerrunner' => '1.4.0@6a2dd33e4166469ade07ad1283b45924383b224b',
  'laminas/laminas-math' => '3.3.2@188456530923a449470963837c25560f1fdd8a60',
  'laminas/laminas-servicemanager' => '3.7.0@2b0aee477fdbd3191af7c302b93dbc5fda0626f4',
  'laminas/laminas-stdlib' => '3.4.0@e89c2268c9cad25099f562f7f015c28c5dd383c9',
  'laminas/laminas-stratigility' => '3.4.0@5553756e056825b24ae6ac8621404b7b1d47b516',
  'laminas/laminas-zendframework-bridge' => '1.3.0@13af2502d9bb6f7d33be2de4b51fb68c6cdb476e',
  'lcobucci/jwt' => '3.4.5@511629a54465e89a31d3d7e4cf0935feab8b14c1',
  'mezzio/mezzio' => '3.5.1@4c4ec0b7acb973cd19e18ca6b1e7a067681f9b09',
  'mezzio/mezzio-cors' => '1.0.4@3f31748a70ff79147ded3050d3615e58f795d186',
  'mezzio/mezzio-fastroute' => '3.2.0@faa586b35dc76231a5dce736227046ccbee2b5f1',
  'mezzio/mezzio-helpers' => '5.6.0@d0dfb5f447faf7e019436976adec5128a0379132',
  'mezzio/mezzio-router' => '3.6.0@f36f7149db1c17c0bdff86ddcfea66ae22b1737f',
  'mezzio/mezzio-template' => '2.1.1@8f36e80b3ac6d794cf324134b368ec00bb4cfdbe',
  'monolog/monolog' => '2.3.2@71312564759a7db5b789296369c1a264efc43aad',
  'mtdowling/jmespath.php' => '2.6.1@9b87907a81b87bc76d19a7fb2d61e61486ee9edb',
  'nesbot/carbon' => '2.50.0@f47f17d17602b2243414a44ad53d9f8b9ada5fdb',
  'nikic/fast-route' => 'v1.3.0@181d480e08d9476e61381e04a71b34dc0432e812',
  'nikic/php-parser' => 'v4.12.0@6608f01670c3cc5079e18c1dab1104e002579143',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.1.1@8622567409010282b7aeebe4bb841fe98b58dcaf',
  'psr/http-client' => '1.0.1@2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
  'psr/http-factory' => '1.0.1@12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
  'psr/http-message' => '1.0.1@f6561bf28d520154e4b0ec72be95418abe6d9363',
  'psr/http-server-handler' => '1.0.1@aff2f80e33b7f026ec96bb42f63242dc50ffcae7',
  'psr/http-server-middleware' => '1.0.1@2296f45510945530b9dceb8bcedb5cb84d40c5f5',
  'psr/log' => '1.1.4@d49695b909c3b7628b6289db5479a1c204601f11',
  'psr/simple-cache' => '1.0.1@408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
  'ralouphie/getallheaders' => '3.0.3@120b605dfeb996808c31b6477290a714d356e822',
  'riverline/multipart-parser' => '2.0.8@2fe9026789754c1ff07c06047f0acc113e90933a',
  'rize/uri-template' => '0.3.3@6e0b97e00e0f36c652dd3c37b194ef07de669b82',
  'sendgrid/php-http-client' => '3.14.0@7880d5aecc53856802130ba83af1dfcf942e9767',
  'sendgrid/sendgrid' => '7.9.2@ab0023a6233f39e408b5eb8c4299f20790f5f5a7',
  'starkbank/ecdsa' => '0.0.5@484bedac47bac4012dc73df91da221f0a66845cb',
  'symfony/console' => 'v5.3.4@ebd610dacd40d75b6a12bf64b5ccd494fc7d6ab1',
  'symfony/deprecation-contracts' => 'v2.4.0@5f38c8804a9e97d23e0c8d63341088cd8a22d627',
  'symfony/finder' => 'v5.3.4@17f50e06018baec41551a71a15731287dbaab186',
  'symfony/polyfill-ctype' => 'v1.23.0@46cd95797e9df938fdd2b03693b5fca5e64b01ce',
  'symfony/polyfill-intl-grapheme' => 'v1.23.0@24b72c6baa32c746a4d0840147c9715e42bb68ab',
  'symfony/polyfill-intl-normalizer' => 'v1.23.0@8590a5f561694770bdcd3f9b5c69dde6945028e8',
  'symfony/polyfill-mbstring' => 'v1.23.0@2df51500adbaebdc4c38dea4c89a2e131c45c8a1',
  'symfony/polyfill-php73' => 'v1.23.0@fba8933c384d6476ab14fb7b8526e5287ca7e010',
  'symfony/polyfill-php80' => 'v1.23.0@eca0bf41ed421bed1b57c4958bab16aa86b757d0',
  'symfony/service-contracts' => 'v2.4.0@f040a30e04b57fbcc9c6cbcf4dbaa96bd318b9bb',
  'symfony/string' => 'v5.3.3@bd53358e3eccec6a670b5f33ab680d8dbe1d4ae1',
  'symfony/translation' => 'v5.3.4@d89ad7292932c2699cbe4af98d72c5c6bbc504c1',
  'symfony/translation-contracts' => 'v2.4.0@95c812666f3e91db75385749fe219c5e494c7f95',
  'symfony/yaml' => 'v5.3.4@90909bd7352ae57411a93fcd67b09e6199340547',
  'voku/portable-ascii' => '1.5.6@80953678b19901e5165c56752d087fc11526017c',
  'webimpress/safe-writer' => '2.2.0@9d37cc8bee20f7cb2f58f6e23e05097eab5072e6',
  'webmozart/assert' => '1.10.0@6964c76c7804814a842473e0c8fd15bab0f18e25',
  'zircote/swagger-php' => '3.2.3@41ed0eb1dacebe2c365623b3f9ab13d1531a03da',
  'doctrine/instantiator' => '1.4.0@d56bf6102915de5702778fe20f2de3b2fe570b5b',
  'laminas/laminas-composer-autoloading' => '2.2.0@4267d3469df364d8375de1b675436031fd9756c4',
  'laminas/laminas-development-mode' => '3.3.0@11b2adc8837e4419a5b31e2a7ae59f06636d4096',
  'mezzio/mezzio-tooling' => '1.4.0@2ad3390459183ee2c670bcb507ce334bcc219e23',
  'myclabs/deep-copy' => '1.10.2@776f831124e9c62e1a2c601ecc52e776d8bb7220',
  'phar-io/manifest' => '2.0.3@97803eca37d319dfa7826cc2437fc020857acb53',
  'phar-io/version' => '3.1.0@bae7c545bef187884426f042434e561ab1ddb182',
  'phpdocumentor/reflection-common' => '2.2.0@1d01c49d4ed62f25aa84a747ad35d5a16924662b',
  'phpdocumentor/reflection-docblock' => '5.2.2@069a785b2141f5bcf49f3e353548dc1cce6df556',
  'phpdocumentor/type-resolver' => '1.4.0@6a467b8989322d92aa1c8bf2bebcc6e5c2ba55c0',
  'phpspec/prophecy' => '1.13.0@be1996ed8adc35c3fd795488a653f4b518be70ea',
  'phpspec/prophecy-phpunit' => 'v2.0.1@2d7a9df55f257d2cba9b1d0c0963a54960657177',
  'phpunit/php-code-coverage' => '9.2.6@f6293e1b30a2354e8428e004689671b83871edde',
  'phpunit/php-file-iterator' => '3.0.5@aa4be8575f26070b100fccb67faabb28f21f66f8',
  'phpunit/php-invoker' => '3.1.1@5a10147d0aaf65b58940a0b72f71c9ac0423cc67',
  'phpunit/php-text-template' => '2.0.4@5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28',
  'phpunit/php-timer' => '5.0.3@5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2',
  'phpunit/phpunit' => '9.5.7@d0dc8b6999c937616df4fb046792004b33fd31c5',
  'roave/security-advisories' => 'dev-master@52a126190a36bc9236846f5d42e10bff9ff60d72',
  'sebastian/cli-parser' => '1.0.1@442e7c7e687e42adc03470c7b668bc4b2402c0b2',
  'sebastian/code-unit' => '1.0.8@1fc9f64c0927627ef78ba436c9b17d967e68e120',
  'sebastian/code-unit-reverse-lookup' => '2.0.3@ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5',
  'sebastian/comparator' => '4.0.6@55f4261989e546dc112258c7a75935a81a7ce382',
  'sebastian/complexity' => '2.0.2@739b35e53379900cc9ac327b2147867b8b6efd88',
  'sebastian/diff' => '4.0.4@3461e3fccc7cfdfc2720be910d3bd73c69be590d',
  'sebastian/environment' => '5.1.3@388b6ced16caa751030f6a69e588299fa09200ac',
  'sebastian/exporter' => '4.0.3@d89cc98761b8cb5a1a235a6b703ae50d34080e65',
  'sebastian/global-state' => '5.0.3@23bd5951f7ff26f12d4e3242864df3e08dec4e49',
  'sebastian/lines-of-code' => '1.0.3@c1c2e997aa3146983ed888ad08b15470a2e22ecc',
  'sebastian/object-enumerator' => '4.0.4@5c9eeac41b290a3712d88851518825ad78f45c71',
  'sebastian/object-reflector' => '2.0.4@b4f479ebdbf63ac605d183ece17d8d7fe49c15c7',
  'sebastian/recursion-context' => '4.0.4@cd9d8cf3c5804de4341c283ed787f099f5506172',
  'sebastian/resource-operations' => '3.0.3@0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8',
  'sebastian/type' => '2.3.4@b8cd8a1c753c90bc1a0f5372170e3e489136f914',
  'sebastian/version' => '3.0.2@c6c1022351a901512170118436c764e473f6de8c',
  'theseer/tokenizer' => '1.2.0@75a63c33a8577608444246075ea0af0d052e452a',
  'agencycoda/mezzio-skeleton' => '1.0.0+no-version-set@',
);

    private function __construct()
    {
    }

    /**
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function rootPackageName() : string
    {
        if (!class_exists(InstalledVersions::class, false) || !(method_exists(InstalledVersions::class, 'getAllRawData') ? InstalledVersions::getAllRawData() : InstalledVersions::getRawData())) {
            return self::ROOT_PACKAGE_NAME;
        }

        return InstalledVersions::getRootPackage()['name'];
    }

    /**
     * @throws OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function getVersion(string $packageName): string
    {
        if (class_exists(InstalledVersions::class, false) && (method_exists(InstalledVersions::class, 'getAllRawData') ? InstalledVersions::getAllRawData() : InstalledVersions::getRawData())) {
            return InstalledVersions::getPrettyVersion($packageName)
                . '@' . InstalledVersions::getReference($packageName);
        }

        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}