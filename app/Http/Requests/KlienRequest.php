<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class KlienRequest extends Request
{
    /**
     * @var array
     */
    protected $attrs = [
        'nama'    => 'nama',
        'email'   => 'email',
        'status' => 'status',
        'no_hp'   => 'no_hp',

    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama'   => '',
            'email'  => '',
            'status' => '',
            'no_hp'  => '',

        ];
    }

    /**
     * @param $validator
     *
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

    /**
     * @param Validator $validator
     *
     * @return array
     *
     */
    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors();
        return [
            'success'    => false,
            'validation' => [
                'nama'   => $message->first('nama'),
                'email'  => $message->first('email'),
                'status' => $message->first('status'),
                'no_hp'  => $message->first('no_hp'),
            ],
        ];
    }
}

