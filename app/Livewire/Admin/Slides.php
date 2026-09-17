<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Slide;

class Slides extends Component
{

    use WithFileUploads;

    public $isUpdateSlideMode = false;
    public $slide_id, $slide_heading, $slide_link, $slide_image, $slide_status = true;

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

    public function render()
    {
        return view('livewire.admin.slides',[
            'slides' => Slide::orderBy('ordering', 'asc')->get()
        ]);
    }
}
