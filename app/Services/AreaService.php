<?php

namespace App\Services;

use App\Models\Area;
use App\Repositories\AreaRepository;
use Auth;

class AreaService
{

    protected $model, $area;

    public function __construct(AreaRepository $area)
    {
        $this->area = $area;
    }
    /** get all area by type  */
    public function index()
    {
        return $this->area->index()->get();
    }

    /** add new area to sysytem */
    public function store($request)
    {
        return $this->area->store($request);
    }

    /** show specific area  */
    public function show($id)
    {
        return $this->area->show($id);
    }

    /** accept updates for area */
    public function update($request, $id)
    {
        return  $this->area->update($request, $id);
    }

    /** block specific area */

    public function blockStatus($area_id)
    {
        return  $this->area->blockStatus($area_id);
    }

    public function unblockStatus($area_id)
    {

        return  $this->area->unblockStatus($area_id);
    }

    /** delete area */
    public function delete($id)
    {
        return $this->area->delete($id);
    }

    /** getAreasOfSubjects */
    public function getAreasOfSubjects($cityId)
    {
        return $this->area->getAreasOfSubjects($cityId);
    }
}
