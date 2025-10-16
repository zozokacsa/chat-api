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

    'accepted' => 'A(z) :attribute mezőt el kell fogadni.',
    'accepted_if' => 'A(z) :attribute mezőt el kell fogadni, amikor :other :value.',
    'active_url' => 'A(z) :attribute mezőnek érvényes URL-nek kell lennie.',
    'after' => 'A(z) :attribute mezőnek a(z) :date utáni dátumnak kell lennie.',
    'after_or_equal' => 'A(z) :attribute mezőnek a(z) :date utáni vagy azzal egyenlő dátumnak kell lennie.',
    'alpha' => 'A(z) :attribute mező csak betűket tartalmazhat.',
    'alpha_dash' => 'A(z) :attribute mező csak betűket, számokat, kötőjeleket és alulvonásokat tartalmazhat.',
    'alpha_num' => 'A(z) :attribute mező csak betűket és számokat tartalmazhat.',
    'any_of' => 'A(z) :attribute mező érvénytelen.',
    'array' => 'A(z) :attribute mezőnek tömbnek kell lennie.',
    'ascii' => 'A(z) :attribute mező csak egységbájtos alfanumerikus karaktereket és szimbólumokat tartalmazhat.',
    'before' => 'A(z) :attribute mezőnek a(z) :date előtti dátumnak kell lennie.',
    'before_or_equal' => 'A(z) :attribute mezőnek a(z) :date előtti vagy azzal egyenlő dátumnak kell lennie.',
    'between' => [
        'array' => 'A(z) :attribute mezőnek :min és :max elem között kell lennie.',
        'file' => 'A(z) :attribute mezőnek :min és :max kilobájt között kell lennie.',
        'numeric' => 'A(z) :attribute mezőnek :min és :max között kell lennie.',
        'string' => 'A(z) :attribute mezőnek :min és :max karakter között kell lennie.',
    ],
    'boolean' => 'A(z) :attribute mezőnek igaznak vagy hamisnak kell lennie.',
    'can' => 'A(z) :attribute mező nem engedélyezett értéket tartalmaz.',
    'confirmed' => 'A(z) :attribute mező megerősítése nem egyezik.',
    'contains' => 'A(z) :attribute mező hiányzik egy kötelező érték.',
    'current_password' => 'A jelszó helytelen.',
    'date' => 'A(z) :attribute mezőnek érvényes dátumnak kell lennie.',
    'date_equals' => 'A(z) :attribute mezőnek a(z) :date dátumnak kell lennie.',
    'date_format' => 'A(z) :attribute mezőnek meg kell felelnie a(z) :format formátumnak.',
    'decimal' => 'A(z) :attribute mezőnek :decimal tizedesjegye kell legyen.',
    'declined' => 'A(z) :attribute mezőt el kell utasítani.',
    'declined_if' => 'A(z) :attribute mezőt el kell utasítani, amikor :other :value.',
    'different' => 'A(z) :attribute mező és a(z) :other mező különböző kell legyen.',
    'digits' => 'A(z) :attribute mezőnek :digits számjegyből kell állnia.',
    'digits_between' => 'A(z) :attribute mezőnek :min és :max számjegy között kell lennie.',
    'dimensions' => 'A(z) :attribute mező érvénytelen kép méreteket tartalmaz.',
    'distinct' => 'A(z) :attribute mező duplikált értéket tartalmaz.',
    'doesnt_contain' => 'A(z) :attribute mező nem tartalmazhatja a következőket: :values.',
    'doesnt_end_with' => 'A(z) :attribute mező nem érkezhet a következőkkel: :values.',
    'doesnt_start_with' => 'A(z) :attribute mező nem kezdődhet a következőkkel: :values.',
    'email' => 'A(z) :attribute mezőnek érvényes email címnek kell lennie.',
    'ends_with' => 'A(z) :attribute mezőnek a következő valamelyikével kell végződnie: :values.',
    'enum' => 'A kiválasztott :attribute érvénytelen.',
    'exists' => 'A kiválasztott :attribute érvénytelen.',
    'extensions' => 'A(z) :attribute mezőnek a következő kiterjesztések egyikével kell rendelkeznie: :values.',
    'file' => 'A(z) :attribute mezőnek fájlnak kell lennie.',
    'filled' => 'A(z) :attribute mezőnek értéket kell tartalmaznia.',
    'gt' => [
        'array' => 'A(z) :attribute mezőnek több mint :value elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute mezőnek nagyobbnak kell lennie, mint :value kilobájt.',
        'numeric' => 'A(z) :attribute mezőnek nagyobbnak kell lennie, mint :value.',
        'string' => 'A(z) :attribute mezőnek nagyobbnak kell lennie, mint :value karakter.',
    ],
    'gte' => [
        'array' => 'A(z) :attribute mezőnek legalább :value elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute mezőnek nagyobbnak vagy egyenlőnek kell lennie :value kilobájttal.',
        'numeric' => 'A(z) :attribute mezőnek nagyobbnak vagy egyenlőnek kell lennie :value.',
        'string' => 'A(z) :attribute mezőnek nagyobbnak vagy egyenlőnek kell lennie :value karakterrel.',
    ],
    'hex_color' => 'A(z) :attribute mezőnek érvényes hexadecimális színnek kell lennie.',
    'image' => 'A(z) :attribute mezőnek képnek kell lennie.',
    'in' => 'A kiválasztott :attribute érvénytelen.',
    'in_array' => 'A(z) :attribute mezőnek léteznie kell a(z) :other mezőben.',
    'in_array_keys' => 'A(z) :attribute mezőnek legalább az egyik következő kulcsot tartalmaznia kell: :values.',
    'integer' => 'A(z) :attribute mezőnek egész számnak kell lennie.',
    'ip' => 'A(z) :attribute mezőnek érvényes IP-címnek kell lennie.',
    'ipv4' => 'A(z) :attribute mezőnek érvényes IPv4-címnek kell lennie.',
    'ipv6' => 'A(z) :attribute mezőnek érvényes IPv6-címnek kell lennie.',
    'json' => 'A(z) :attribute mezőnek érvényes JSON-karaktersorozatnak kell lennie.',
    'list' => 'A(z) :attribute mezőnek listának kell lennie.',
    'lowercase' => 'A(z) :attribute mezőnek kisbetűsnek kell lennie.',
    'lt' => [
        'array' => 'A(z) :attribute mezőnek kevesebb, mint :value elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute mezőnek kevesebb, mint :value kilobájtnak kell lennie.',
        'numeric' => 'A(z) :attribute mezőnek kisebbnek kell lennie, mint :value.',
        'string' => 'A(z) :attribute mezőnek kevesebb, mint :value karakterből kell állnia.',
    ],
    'lte' => [
        'array' => 'A(z) :attribute mezőnek legfeljebb :value elemet tartalmazhat.',
        'file' => 'A(z) :attribute mezőnek kisebbnek vagy egyenlőnek kell lennie :value kilobájttal.',
        'numeric' => 'A(z) :attribute mezőnek kisebbnek vagy egyenlőnek kell lennie :value-nál.',
        'string' => 'A(z) :attribute mezőnek legfeljebb :value karakterből kell állnia.',
    ],
    'mac_address' => 'A(z) :attribute mezőnek érvényes MAC-címnek kell lennie.',
    'max' => [
        'array' => 'A(z) :attribute mezőnek legfeljebb :max elemet szabad tartalmaznia.',
        'file' => 'A(z) :attribute mező nem lehet nagyobb, mint :max kilobájt.',
        'numeric' => 'A(z) :attribute mező nem lehet nagyobb, mint :max.',
        'string' => 'A(z) :attribute mező nem lehet hosszabb, mint :max karakter.',
    ],
    'max_digits' => 'A(z) :attribute mezőnek legfeljebb :max számjegye lehet.',
    'mimes' => 'A(z) :attribute mezőnek a következő típusú fájlnak kell lennie: :values.',
    'mimetypes' => 'A(z) :attribute mezőnek a következő típusú fájlnak kell lennie: :values.',
    'min' => [
        'array' => 'A(z) :attribute mezőnek legalább :min elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute mezőnek legalább :min kilobájtnak kell lennie.',
        'numeric' => 'A(z) :attribute mezőnek legalább :min-nek kell lennie.',
        'string' => 'A(z) :attribute mezőnek legalább :min karakterből kell állnia.',
    ],
    'min_digits' => 'A(z) :attribute mezőnek legalább :min számjegyet kell tartalmaznia.',
    'missing' => 'A(z) :attribute mezőnek hiányoznia kell.',
    'missing_if' => 'A(z) :attribute mezőnek hiányoznia kell, amikor :other :value.',
    'missing_unless' => 'A(z) :attribute mezőnek hiányoznia kell, hacsak :other nem :value.',
    'missing_with' => 'A(z) :attribute mezőnek hiányoznia kell, amikor :values jelen van.',
    'missing_with_all' => 'A(z) :attribute mezőnek hiányoznia kell, amikor :values jelen van.',
    'multiple_of' => 'A(z) :attribute mezőnek a(z) :value többszörösének kell lennie.',
    'not_in' => 'A kiválasztott :attribute érvénytelen.',
    'not_regex' => 'A(z) :attribute mező formátuma érvénytelen.',
    'numeric' => 'A(z) :attribute mezőnek számnak kell lennie.',
    'password' => [
        'letters' => 'A(z) :attribute mezőnek legalább egy betűt kell tartalmaznia.',
        'mixed' => 'A(z) :attribute mezőnek legalább egy nagybetűt és egy kisbetűt kell tartalmaznia.',
        'numbers' => 'A(z) :attribute mezőnek legalább egy számot kell tartalmaznia.',
        'symbols' => 'A(z) :attribute mezőnek legalább egy szimbólumot kell tartalmaznia.',
        'uncompromised' => 'A megadott :attribute szerepelt egy adatlopásban. Kérlek, válassz másik :attribute-t.',
    ],
    'present' => 'A(z) :attribute mezőnek jelen kell lennie.',
    'present_if' => 'A(z) :attribute mezőnek jelen kell lennie, amikor :other :value.',
    'present_unless' => 'A(z) :attribute mezőnek jelen kell lennie, hacsak :other nem :value.',
    'present_with' => 'A(z) :attribute mezőnek jelen kell lennie, amikor :values jelen van.',
    'present_with_all' => 'A(z) :attribute mezőnek jelen kell lennie, amikor :values jelen van.',
    'prohibited' => 'A(z) :attribute mező tilos.',
    'prohibited_if' => 'A(z) :attribute mező tilos, amikor :other :value.',
    'prohibited_if_accepted' => 'A(z) :attribute mező tilos, amikor :other elfogadott.',
    'prohibited_if_declined' => 'A(z) :attribute mező tilos, amikor :other elutasított.',
    'prohibited_unless' => 'A(z) :attribute mező tilos, hacsak :other nincs :values között.',
    'prohibits' => 'A(z) :attribute mező megakadályozza, hogy :other jelen legyen.',
    'regex' => 'A(z) :attribute mező formátuma érvénytelen.',
    'required' => 'A(z) :attribute mező kötelező.',
    'required_array_keys' => 'A(z) :attribute mezőnek tartalmaznia kell a következő bejegyzéseket: :values.',
    'required_if' => 'A(z) :attribute mező kötelező, amikor :other :value.',
    'required_if_accepted' => 'A(z) :attribute mező kötelező, amikor :other elfogadott.',
    'required_if_declined' => 'A(z) :attribute mező kötelező, amikor :other elutasított.',
    'required_unless' => 'A(z) :attribute mező kötelező, hacsak :other nincs :values között.',
    'required_with' => 'A(z) :attribute mező kötelező, amikor :values jelen van.',
    'required_with_all' => 'A(z) :attribute mező kötelező, amikor :values jelen van.',
    'required_without' => 'A(z) :attribute mező kötelező, amikor :values nincs jelen.',
    'required_without_all' => 'A(z) :attribute mező kötelező, amikor egyik :values sem jelen van.',
    'same' => 'A(z) :attribute mezőnek egyeznie kell a(z) :other mezővel.',
    'size' => [
        'array' => 'A(z) :attribute mezőnek :size elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute mezőnek :size kilobájtnak kell lennie.',
        'numeric' => 'A(z) :attribute mezőnek :size-nak kell lennie.',
        'string' => 'A(z) :attribute mezőnek :size karakterből kell állnia.',
    ],
    'starts_with' => 'A(z) :attribute mezőnek az alábbiak egyikével kell kezdődnie: :values.',
    'string' => 'A(z) :attribute mezőnek szövegnek kell lennie.',
    'timezone' => 'A(z) :attribute mezőnek érvényes időzónának kell lennie.',
    'unique' => 'A(z) :attribute már foglalt.',
    'uploaded' => 'A(z) :attribute feltöltése sikertelen volt.',
    'uppercase' => 'A(z) :attribute mezőnek nagybetűsnek kell lennie.',
    'url' => 'A(z) :attribute mezőnek érvényes URL-nek kell lennie.',
    'ulid' => 'A(z) :attribute mezőnek érvényes ULID-nek kell lennie.',
    'uuid' => 'A(z) :attribute mezőnek érvényes UUID-nek kell lennie.',


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
