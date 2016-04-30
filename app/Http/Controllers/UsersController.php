<?php
namespace App\Http\Controllers;

use App\Domain\Entities\users;
use App\Domain\Repositories\UsersRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
/**
 * Class EventController
 *
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{

    protected $users;

    public function __construct(UsersRepository $users)
    {
        $this->users= $users;
    }
    /**
     *  @param Request $request
     *
     * @return \Illuminate\Pagination\Paginator|mixed
     */
    public function index(Request $request)
    {
        return $this->users->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }
    public function store(UsersRequest $request)
    {
        return $this->users->create($request->all());
    }
    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return $this->users->find($id);
    }
    /**
     * @param UsersRequest $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function update(UsersRequest $request, $id)
    {
        return $this->users->update($id, $request->all());
    }
    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        return $this->users->delete($id);
    }
}