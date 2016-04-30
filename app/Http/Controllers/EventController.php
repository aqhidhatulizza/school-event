<?php
namespace App\Http\Controllers;

use App\Domain\Entities\Event;
use App\Domain\Repositories\EventRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class EventController
 *
 * @package App\Http\Controllers
 */
class EventController extends Controller
{

    protected $event;

    public function __construct(EventRepository $event)
    {
        $this->event = $event;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Pagination\Paginator|mixed
     */
    public function index(Request $request)
    {
        return $this->event->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    public function store(EventRequest $request)
    {
        return $this->event->create($request->all());
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return $this->event->find($id);
    }

    /**
     * @param EventRequest $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function update(EventRequest $request, $id)
    {
        return $this->event->update($id, $request->all());
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        return $this->event->delete($id);
    }

    public function listEvent()
    {
        return $this->event->getListEvent($start = '', $end = '');
    }
}