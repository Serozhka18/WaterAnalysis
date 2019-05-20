<?php

namespace App\Http\Controllers;

use App\Http\Requests\Result\ResultSavePostRequest;
use App\Http\Requests\Result\ResultUpdatePutRequest;
use App\Http\Requests\ResultFilterGetRequest;
use App\Models\Region;
use App\Models\Result;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ResultController
 * @package App\Http\Controllers
 */
class ResultController extends Controller
{
    /**
     * @param ResultFilterGetRequest $request
     * @return View
     */
    public function index(ResultFilterGetRequest $request): View
    {
        $resultQuery = (new Result())->newQuery();
        $resultQuery->with('region');

        if ($request->result_key) {
            $resultQuery->where('result', 'like', '%' . $request->result_key . '%');
        }
        if ($request->region_id) {
            $resultQuery->whereHas('region', function ($query) use ($request) {
                return $query->where('id', $request->region_id);
            });
        }

        if (auth()->user()->hasRole(['admin'])) {
            $results = $resultQuery->get();
        } else {
            $results = $resultQuery->where('user_id', auth()->user()->id)->get();
        }
        $regions = Region::all();

        return view('results', [
            'results' => $results,
            'regions' => $regions
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $result = Result::with('region')->find($id);

        return view('result_show', ['result' => $result]);
    }

    /**
     * @return View
     */
    public function addForm(): View
    {
        $regions = Region::all();

        return view('result_add', ['regions' => $regions]);
    }

    /**
     * @param ResultSavePostRequest $request
     * @return RedirectResponse
     */
    public function save(ResultSavePostRequest $request): RedirectResponse
    {
        $result = auth()->user()->results()->create($request->only(['region_id', 'result']));

        if ($result) {
            return redirect()->route('results');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param int $id
     * @return View
     */
    public function editForm(int $id): View
    {
        $result = Result::with('region')->find($id);
        $regions = Region::all();

        return view('result_edit', [
            'result'  => $result,
            'regions' => $regions,
        ]);
    }

    /**
     * @param int $id
     * @param ResultUpdatePutRequest $request
     * @return RedirectResponse
     */
    public function update(int $id, ResultUpdatePutRequest $request): RedirectResponse
    {
        $result = Result::find($id);
        $result->result = $request->result;
        $result->region_id = $request->region_id;
        $result->save();

        return redirect()->back();
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        Result::destroy($id);

        return redirect()->back();
    }
}
