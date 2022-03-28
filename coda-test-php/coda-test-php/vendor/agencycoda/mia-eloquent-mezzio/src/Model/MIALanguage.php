<?php 

namespace Mia\Database\Model;

/**
 * Description of Model
 * @property int $id Notification ID
 * @property string $title Title
 * @property string $code Slug
 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="code",
 *  type="string",
 *  description=""
 * )
 *
 * @author matiascamiletti
 */
class MIALanguage extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Name of table
     */
    protected $table = 'mia_language';

    //protected $casts = ['data' => 'array'];
}