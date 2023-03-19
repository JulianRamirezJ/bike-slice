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

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'accepted_if' => 'El campo :attribute debe ser aceptado cuando :other es :value.',
    'active_url' => 'El campo :attribute debe ser una URL válida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute solo puede contener letras.',
    'alpha_dash' => 'El campo :attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El campo :attribute solo puede contener letras y números.',
    'array' => 'El campo :attribute debe ser un array.',
    'ascii' => 'El campo :attribute solo puede contener caracteres alfanuméricos de un solo byte y símbolos.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'El campo :attribute debe tener entre :min y :max elementos.',
        'file' => 'El campo :attribute debe tener entre :min y :max kilobytes.',
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
        ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmación del campo :attribute no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El campo :attribute debe ser una fecha válida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El campo :attribute debe coincidir con el formato :format.',
    'decimal' => 'El campo :attribute debe tener :decimal lugares decimales.',
    'declined' => 'El campo :attribute debe ser rechazado.',
    'declined_if' => 'El campo :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El campo :attribute y :other deben ser diferentes.',
    'digits' => 'El campo :attribute debe tener :digits dígitos.',
    'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'El campo :attribute tiene dimensiones de imagen inválidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'doesnt_end_with' => 'El campo :attribute no debe terminar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El campo :attribute no debe empezar con uno de los siguientes: :values.',
    'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'El :attribute seleccionado es inválido.',
    'exists' => 'El :attribute seleccionado es inválido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'array' => 'El campo :attribute debe tener más de :value elementos.',
        'file' => 'El campo :attribute debe ser mayor a :value kilobytes.',
        'string' => 'El campo :attribute debe ser mayor a :value caracteres.',
        'numeric' => 'El campo :attribute debe ser mayor a :value.',
        'page' => [
        'next' => 'Siguiente',
        'previous' => 'Anterior',
        ],
        ],
        
        'gte' => [
        'numeric' => 'El campo :attribute debe ser mayor o igual a :value.',
        'file' => 'El campo :attribute debe ser mayor o igual a :value kilobytes.',
        'string' => 'El campo :attribute debe ser mayor o igual a :value caracteres.',
        'array' => 'El campo :attribute debe tener :value elementos o más.',
        ],
        
        'exists' => 'El :attribute seleccionado es inválido.',
        'file' => 'El campo :attribute debe ser un archivo.',
        'image' => 'El campo :attribute debe ser una imagen.',
        'in' => 'El :attribute seleccionado es inválido.',
        'in_array' => 'El campo :attribute no existe en :other.',
        'integer' => 'El campo :attribute debe ser un número entero.',
        'ip' => 'El campo :attribute debe ser una dirección IP válida.',
        'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
        'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
        'json' => 'El campo :attribute debe ser una cadena JSON válida.',
        'lt' => [
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'file' => 'El campo :attribute debe ser menor a :value kilobytes.',
        'string' => 'El campo :attribute debe ser menor a :value caracteres.',
        'array' => 'El campo :attribute debe tener menos de :value elementos.',
        ],
        
        'lte' => [
        'numeric' => 'El campo :attribute debe ser menor o igual a :value.',
        'file' => 'El campo :attribute debe ser menor o igual a :value kilobytes.',
        'string' => 'El campo :attribute debe ser menor o igual a :value caracteres.',
        'array' => 'El campo :attribute no debe tener más de :value elementos.',
        ],
        
        'max' => [
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'file' => 'El campo :attribute no debe ser mayor a :max kilobytes.',
        'string' => 'El campo :attribute no debe ser mayor a :max caracteres.',
        'array' => 'El campo :attribute no debe tener más de :max elementos.',
        ],
        
        'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
        'min' => [
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'file' => 'El campo :attribute debe ser al menos de :min kilobytes.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
        'array' => 'El campo :attribute debe tener al menos :min elementos.',
        ],
        
        'not_in' => 'El campo :attribute seleccionado es inválido.',
        'not_regex' => 'El formato del campo :attribute es inválido.',
        'numeric' => 'El campo :attribute debe ser un número.',
        'password' => [
        'password' => 'La contraseña es incorrecta.',
        'reset' => 'Tu contraseña ha sido restablecida.',
        'sent' => 'Se ha enviado por correo electrónico el enlace para restablecer la contraseña.',
        'token' => 'El token para restablecer la contraseña es inválido.',
        'user' => "No se ha encontrado un usuario con la dirección de correo electrónico indicada.",
        'throttled' => 'Por favor espera antes de intentarlo de nuevo.',
        ],
        'present' => 'El campo :attribute debe estar presente.',
        'regex' => 'El formato del campo :attribute es inválido.',
        'required' => 'El campo :attribute es requerido.',
        'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
        'required_unless' => 'El campo :attribute es requerido a menos que :other esté en :values.',
        'required_with' => 'El campo :attribute es requerido cuando :values está presente.',
        'required_with_all' => 'El campo :attribute es requerido cuando :values está presente.',
        'required_without' => 'El campo :attribute es requerido cuando :values no está presente.',
        'required_without_all' => 'El campo :attribute es requerido cuando ninguno de :values están presentes.',
        'same' => 'El campo :attribute y :other deben coincidir.',
        'size' => [
        'array' => 'El campo :attribute debe contener :size elementos.',
        'file' => 'El archivo :attribute debe pesar :size kilobytes.',
        'numeric' => 'El campo :attribute debe ser :size.',
        'string' => 'El campo :attribute debe contener :size caracteres.',
        ],
        'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values.',
        'string' => 'El campo :attribute debe ser una cadena de caracteres.',
        'timezone' => 'El campo :attribute debe ser una zona válida.',
        'unique' => 'El campo :attribute ya ha sido tomado.',
        'uploaded' => 'Error al subir el archivo :attribute.',
        'url' => 'El formato del campo :attribute es inválido.',
        'uuid' => 'El campo :attribute debe ser un UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
