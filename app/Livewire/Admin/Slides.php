<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slide;
use Illuminate\Support\Facades\File;

class Slides extends Component
{

    use WithFileUploads;

    public $isUpdateSlideMode = false;
    public $slide_id, $slide_heading, $slide_link, $slide_image, $slide_status = true;
    public $selected_slide_image = null;

    protected $listeners = [
        'updateSlideOrdering',
        'deleteSlideAction'
    ];

    public function updateSlideImage(){
        if($this->slide_image) {
            $this->selected_slide_image = $this->slides_image->temporaryUrl();
            }
        }

    public function addSlide()
    {
        $this->slide_id = null;
        $this->slide_heading = null;
        $this->slide_link = null;
        $this->slide_image = null;
        $this->slide_status = true;
        $this->isUpdateSlideMode = false;
        $this->showSlideModalForm();
    }

    public function showSlideModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showSlideModalForm');
    }

    public function hideSlideModalForm()
    {
        $this->dispatch('hideSlideModalForm');
        $this->isUpdateSlideMode = false;
        $this->slide_id = $this-> slide_heading = $this->slide_link = $this->slide_image = null;
        $this->slide_status = true;
    }

    public function createSlide(){
        $this->validate([
            'slide_heading' => 'required|string|max:255',
            'slide_link' => 'nullable|url|max:255',
            'slide_image' => 'required|image|max:2048', // 2MB Max
        ]);

        //dd('teste');
        $path = "slides/";
        $file = $this->slide_image;
        $fileName = "SLD_".date('YmdHis', time()). "." .$file->getClientOriginalExtension();

        $upload = $file->storeAs($path, $fileName, 'slides_uploads');

        if( !$upload ) {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Deu ruim ao tentar fazer upload da imagem.']);
        }else{
            $slide = new Slide();
            $slide->image = $fileName;
            $slide->heading = $this->slide_heading;
            $slide->link = $this->slide_link;
            $slide->status = $this->slide_status == true ? 1 : 0;
            $saved = $slide->save();

            if ($saved) {
                $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Slide criado com sucesso!']);
                $this->hideSlideModalForm();
            } else {
                $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Deu ruim ao tentar criar o slide.']);
            }
        }
    }

    public function editSlide($slide_id)
    {
        $slide = Slide::findOrFail($slide_id);
        $this->slide_id = $slide->id;
        $this->slide_heading = $slide->heading;
        $this->slide_link = $slide->link;
        $this->slide_status = $slide->status == 1 ? true : false;
        $this->selected_slide_image = '/images/slides/'.$slide->image;
        $this->isUpdateSlideMode = true;
        $this->showSlideModalForm();
    }

    public function updateSlide(){
        $this->validate([
            'slide_heading' => 'required|string|max:255',
            'slide_link' => 'nullable|url|max:255',
            'slide_image' => 'nullable|image|max:2048', // 2MB Max
        ]);

        $slide = Slide::findOrFail($this->slide_id);
        $slide->heading = $this->slide_heading;
        $slide->link = $this->slide_link;
        $slide->status = $this->slide_status == true ? 1 : 0;

        if ($this->slide_image) {
            // Handle image upload
            $path = "slides/";
            $file = $this->slide_image;
            $fileName = "SLD_".date('YmdHis', time()). "." .$file->getClientOriginalExtension();
            $upload = $file->storeAs($path, $fileName, 'slides_uploads');

            if( !$upload ) {
                $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Deu ruim ao tentar fazer upload da imagem.']);
                return;
            } else {
                // Delete old image if exists
                if ($slide->image && file_exists(public_path('images/slides/'.$slide->image))) {
                    unlink(public_path('images/slides/'.$slide->image));
                }
                $slide->image = $fileName;
            }
        }

        $saved = $slide->save();

        if ($saved) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Slide atualizado com sucesso!']);
            $this->hideSlideModalForm();
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Deu ruim ao tentar atualizar o slide.']);
        }
    }

    public function updateSlideOrdering($positions)
    {
        foreach($positions as $position) {
            $index = $position[0];
            $newPosition = $position[1];
            Slide::where('id', $index)->update(['ordering' => $newPosition]);
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Ordem dos slides atualizada com sucesso!']);
        }
    }

    public function deleteSlideAction($id)
    {
        $slide = Slide::findOrFail($id);
        $path = "slides/";
        $slides_path = "images/".$path;
        $slide_image = $slide->image;

        if ($slide_image != '' && File::exists(public_path($slides_path.$slide_image))) {
            File::delete(public_path($slides_path.$slide_image));
        }

        $deleted = $slide->delete();

        if ($deleted) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Slide deletado com sucesso!']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Deu ruim ao tentar deletar o slide.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.slides',[
            'slides' => Slide::orderBy('ordering', 'asc')->get()
        ]);
    }
}
