<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute必须接受',
    'active_url'           => ':attribute必须是一个合法的 URL',
    'after'                => ':attribute必须是:date之后的一个日期',
    'after_or_equal'       => ':attribute必须是:date或者之后的一个日期',
    'alpha'                => ':attribute必须全部由字母字符构成',
    'alpha_dash'           => ':attribute必须全部由字母、数字、中划线或下划线字符构成',
    'alpha_num'            => ':attribute必须全部由字母和数字构成',
    'array'                => ':attribute必须是个数组',
    'before'               => ':attribute必须是:date之前的一个日期',
    'before_or_equal'      => ':attribute必须是:date或者之前的一个日期',
    'between'              => [
        'numeric' => ':attribute必须在:min到:max之间',
        'file'    => ':attribute必须在:min到:maxKB之间',
        'string'  => ':attribute必须在:min到:max个字符之间',
        'array'   => ':attribute必须在:min到:max项之间',
    ],
    'boolean'              => ':attribute字符必须是true或false',
    'confirmed'            => ':attribute二次确认不匹配',
    'date'                 => ':attribute必须是一个合法的日期',
    'date_format'          => ':attribute与给定的格式:format不符合',
    'different'            => ':attribute必须不同于:other',
    'digits'               => ':attribute必须是:digits位',
    'digits_between'       => ':attribute必须在:min到:max位之间',
    'dimensions'           => ':attribute图像尺寸不合法',
    'distinct'             => ':attribute字段值不能重复.',
    'email'                => ':attribute必须是一个合法的电子邮件地址',
    'exists'               => '选定的:attribute是无效的',
    'file'                 => ':attribute必须是文件',
    'filled'               => ':attribute的字段是必填的',
    'image'                => ':attribute必须是一个图片 (jpeg, png, bmp 或者 gif)',
    'in'                   => '选定的:attribute是无效的',
    'in_array'             => ':attribute不在:other中',
    'integer'              => ':attribute必须是个整数',
    'ip'                   => ':attribute必须是一个合法的IP地址',
    'json'                 => ':attribute必须是一个合法的JSON字符串',
    'max'                  => [
        'numeric' => ':attribute必须小于或等于:max',
        'file'    => ':attribute的大小最大为:maxKB',
        'string'  => ':attribute的最大长度为:max字符',
        'array'   => ':attribute的最大个数为:max个',
    ],
    'mimes'                => ':attribute的文件类型必须是:values',
    'mimetypes'            => ':attribute的文件类型必须是:values',
    'min'                  => [
        'numeric' => ':attribute必须大于或等于:min',
        'file'    => ':attribute大小至少为:minKB',
        'string'  => ':attribute的最小长度为:min字符',
        'array'   => ':attribute至少有:min项',
    ],
    'not_in'               => '选定的:attribute是无效的',
    'numeric'              => ':attribute必须是数字',
    'present'              => ':attribute字段必须存在',
    'regex'                => ':attribute格式是无效的',
    'required'             => ':attribute字段必须填写',
    'required_if'          => ':attribute字段是必须的当:other是:value',
    'required_unless'      => ':attribute字段是必须的除非:other在:values 中',
    'required_with'        => ':attribute字段是必须的当:values是存在的',
    'required_with_all'    => ':attribute字段是必须的当:values是存在的',
    'required_without'     => ':attribute字段是必须的当:values是不存在的',
    'required_without_all' => ':attribute字段是必须的当没有一个:values是存在的',
    'same'                 => ':attribute和:other必须匹配',
    'size'                 => [
        'numeric' => ':attribute必须是:size位',
        'file'    => ':attribute必须是:sizeKB',
        'string'  => ':attribute必须是:size个字符',
        'array'   => ':attribute必须包括:size项',
    ],
    'string'               => ':attribute必须是字符串',
    'timezone'             => ':attribute必须个有效的时区',
    'unique'               => ':attribute已存在',
    'uploaded'             => ':attribute上传失败',
    'url'                  => ':attribute无效的格式',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'username' => '用户名',
        'password' => '密码',
    ],
];