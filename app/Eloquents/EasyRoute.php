<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EasyRoute
 *
 * @package App\Components\Modules\General\AdvancedPrivileges\ModuleCore\Eloquents
 * @property int $id
 * @property string|null $route_name
 * @property string $route_uri
 * @property string|null $route_controller
 * @property string|null $title
 * @property string|null $description
 * @property array|null $route_params
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute whereRouteController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute whereRouteParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute whereRouteUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquents\EasyRoute whereTitle($value)
 * @mixin \Eloquent
 */
class EasyRoute extends Model
{
    protected $guarded = [];

    protected $casts = [
        'route_params' => 'array',
        'action' => 'array',
        'methods' => 'array',
    ];

    public $timestamps = false;
}
