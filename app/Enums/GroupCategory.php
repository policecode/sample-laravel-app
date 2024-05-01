<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class GroupCategory extends Enum
{
    const AUTHOR =   ['key' => 1, 'value' => 'Tác giả', 'slug' => 'author'];
    const CATEGORY =   ['key' => 2, 'value' => 'Thể loại', 'slug' => 'category'];
    const STATUS =   ['key' => 3, 'value' => 'Trạng thái', 'slug' => 'status'];
    const SOURCE =   ['key' => 4, 'value' => 'Nguồn', 'slug' => 'source'];
}
