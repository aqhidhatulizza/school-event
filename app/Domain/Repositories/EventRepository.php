<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Event;
use Illuminate\Support\Facades\Log;

class EventRepository extends AbstractRepository implements Paginable, Crudable
{

    protected $cache;

    public function __construct(Event $event, Cacheable $cache)
    {
        $this->model = $event;
        $this->cache = $cache;
    }

    public function find($id, array $columns = ['*'])
    {
        // set key
        $key = 'event-find' . $id;
        // has section and key
        if ($this->cache->has(Event::$tags, $key)) {
            return $this->cache->get(Event::$tags, $key);
        }
        // query to sql
        $event = parent::find($id, $columns);
        // store to cache
        $this->cache->put(Event::$tags, $key, $event, 10);
        return $event;
    }

    /**
     * Store a new Record
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        try {
            $event = parent::create(
                [
                    'title'            => e($data['title']),
                    'start'            => e($data['start']),
                    'end'              => e($data['end']),
                    'background_color' => e($data['background_color']),
                    'border_color'     => e($data['border_color']),
                    'url'              => e($data['url']),
                    'content'          => e($data['content']),
                    'status'           => e($data['status']),
                    'is_remember'      => e($data['is_remember']),

                ]);
            // flush cache with tags
            $this->cache->flush(Event::$tags);
            return $event;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . EventRepository::class . ' method : create | ' . $e);
            return $this->createError();
        }
    }

    public function update($id, array $data)
    {
        try {
            $event = parent::update($id, [
                'title'            => e($data['title']),
                'start'            => e($data['start']),
                'end'              => e($data['end']),
                'background_color' => e($data['background_color']),
                'border_color'     => e($data['border_color']),
                'url'              => e($data['url']),
                'content'          => e($data['content']),
                'status'           => e($data['status']),
                'is_remember'      => e($data['is_remember']),
            ]);
            // flush cache with tags
            $this->cache->flush(Event::$tags);
            return $event;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . EventRepository::class . ' method : update | ' . $e);
            return $this->createError();
        }
    }

    /**
     * Delete a record
     *
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        try {
            $event = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Event::$tags);
            return $event;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . EventRepository::class . ' method : delete | ' . $e);
            return $this->createError();
        }
    }


    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'event-get-by-page' . $limit . $page . $search;
        // has section and key
        if ($this->cache->has(Event::$tags, $key)) {
            return $this->cache->get(Event::$tags, $key);
        }
        // query to sql
        $event = $this->model
            ->orderBy('start', 'desc')
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put(Event::$tags, $key, $event, 10);

        return $event;

    }

    public function getListEvent($start, $end)
    {
        // set key
//        $key = 'get-list-event' . $start . $end;
        // has section and key
//        if ($this->cache->has(Event::$tags, $key)) {
//            return $this->cache->get(Event::$tags, $key);
//        }

        // query to sql
        $event = $this->model->all('title', 'start', 'end', 'background_color', 'border_color', 'url');

        // store to cache
//        $this->cache->put(Event::$tags, $key, $event, 10);

        return $event;
    }
}
