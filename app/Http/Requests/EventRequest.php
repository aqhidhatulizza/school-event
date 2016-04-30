<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class EventRequest extends Request
{
    /**
     * @var array
     */
    protected $attrs = [
        'tanggal'     => 'tanggal',
        'jam'         => 'jam',
        'judul_event' => 'judul_event',
        'is_status'   => 'is_status',
        'is_sifat'    => 'is_sifat',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tanggal'     => '',
            'jam'         => '',
            'judul_event' => '',
            'rincin'      => '',
            'is_ulang'    => '',
            'is_sifat'    => '',
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
                'start'            => $message->first('start'),
                'end'              => $message->first('end'),
                'background_color' => $message->first('background_color'),
                'oorder color'     => $message->first('oorder color'),
                'url'              => $message->first('is_ulang'),
                'content'          => $message->first('content'),
                'is_remember'          => $message->first('is_remember'),

            ],
        ];
    }
}

