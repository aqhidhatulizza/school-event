<?php
namespace App\Http\Controllers;

use App\Domain\Entities\Klien;
use App\Domain\Repositories\KlienRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\KlienRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
/**
 * Class EventController
 *
 * @package App\Http\Controllers
 */
class KlienController extends Controller
{

    protected $klien;

    public function __construct(KlienRepository $klien)
    {
        $this->klien= $klien;
    }
    /**
     *  @param Request $request
     *
     * @return \Illuminate\Pagination\Paginator|mixed
     */
    public function index(Request $request)
    {
        return $this->klien->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }
    public function store(KlienRequest $request)
    {
        return $this->klien->create($request->all());
    }
    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return $this->klien->find($id);
    }
    /**
     * @param KlienRequest $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function update(KlienRequest $request, $id)
    {
        return $this->klien->update($id, $request->all());
    }
    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        return $this->klien->delete($id);
    }
}