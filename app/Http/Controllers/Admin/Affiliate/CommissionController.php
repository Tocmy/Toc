<?php
namespace App\Http\Controllers\Admin\Affiliate;

use App\DataTables\Affiliate\CommissionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Affiliate\CommissionRequest;
use App\Models\Affiliate\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function __construct()
    {
        $this->pageTitle = 'Commission Management';
        $this->pageIcon = '';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommissionDataTable $commissionDataTable)
    {
        return $commissionDataTable->render(
            'admin.affiliates.commission.index'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.affiliates.commission.create');
    }

    /**
     * Store a newly created resource in storage.
     * amount = sum of total sales
     * rate
     * commission earn = anount * rate
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommissionRequest $request)
    {
        $commissions = new Commission();
        $commissions->name = $request->name;
        $commissions->description = $request->description;
        $commissions->date = $request->date;
        $commissions->amount = $request->amount;
        $commissions->type = $request->type;
        $commissions->save();
        return redirect()
            ->back()
            ->with('Success', __('Commission has been added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affiliate\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Affiliate\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        $commissions = Commission::findorFail($commission->id);
        return view('admin.affiliates.commission.edit', compact($commission));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Affiliate\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(CommissionRequest $request, Commission $commission)
    {
        $commissions = Commission::findOrFail($request->id);
        $commissions->name = $request->name;
        $commissions->description = $request->description;
        $commissions->date = $request->date;
        $commissions->amount = $request->amount;
        $commissions->type = $request->type;
        $commissions->save();
        return redirect()->back()->with('success', __('Commission has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Affiliate\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        $commission =Commission::findOrFail($commission->id);
        $commission->delete();
        return redirect()->back()->with('success', __('Commission had been deleted succefully'));
    }

    public function changeStatus(Commission $commission)
    {
        if ($commission->status =='Enable') {
            $commission->update([
                    'status' => 'Disable'
                ]);
        } else {
            $commission->update([
                  'status' => 'Enable'
              ]);
        }

        return redirect()->back()->with('Success', __(
            'The status of :name was :atrribute successfully!',
            ['attribute' => __($commission->status == 'Enable' ? 'enabled' : 'disable'), 'name'=>__('commission')]
        ));
    }
}
