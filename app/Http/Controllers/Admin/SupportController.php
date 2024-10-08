<?php       

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {   
        $supports = Support::all();
        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id)
    {
        if (!$support = Support::find($id)) {
            return redirect()->route('supports.index');
        }
       return view('admin.supports.show', compact('support'));

        // return view('admin.supports.edit', compact('support'));
    }

    
    public function create()
    {
        return view('admin.supports.create');
    }
    
    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';
        
        $support->create($data);
        
        return redirect()->route('supports.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Support  $support
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support, string|int $id)
    { 
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }
        
        return view('admin.supports.edit', compact('support'));
    }
    public function update(Request $request, Support $support, string|int $id)
    {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }

        // $support = Support::findOrFail($id);
        // $support->subject = $request->input('subject');
        // $support->body = $request->input('body');
        // $support->save();

        $support->update($request->vallidated());
        

        $support->update($request->only([
            'subject',
            'body',
            'status'
        ]));

        return redirect()->route('supports.index');
        
    }

    public function destroy(Support $support, string|int $id)
    {
        if (!$support = support::find($id)) {
            return back();
        }
        $support->delete();
        return redirect()->route('supports.index');
    }
}