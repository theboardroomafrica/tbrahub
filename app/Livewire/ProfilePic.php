<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\EditAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\IconSize;
use Filament\Support\Enums\MaxWidth;
use Livewire\Component;

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
                    ->label("Update Photo")
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->imagePreviewHeight(250)
                    ->collection('avatars')
            ])
            ->tooltip("Update Photo")
            ->color('info')
            ->iconSize(IconSize::Large)
            ->modalHeading("")
            ->modalWidth(MaxWidth::Small)
            ->iconButton()
            ->icon('heroicon-o-camera')
            ->record($this->user);
    }

    public function render()
    {
        return view('livewire.profile-pic');
    }
}
