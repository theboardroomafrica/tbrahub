<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\EditAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\MaxWidth;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProfilePic extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    public $user;

    public function editAction(): Action
    {
        return EditAction::make()
            ->form([
                SpatieMediaLibraryFileUpload::make('avatar')
                    // ->acceptedFileTypes(['image/*'])
                    ->collection('avatars')
            ])
            ->tooltip("Edit image")
            ->color('info')
            ->modalWidth(MaxWidth::Large)
            ->iconButton()
            ->icon('heroicon-o-pencil')
            ->record(new Media());
    }

    public function render()
    {
        return view('livewire.profile-pic');
    }
}
