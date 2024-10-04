<?php

namespace App\Livewire;



use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('status','Pending'))
            ->columns([
                ImageColumn::make('photo')->circular(),
                TextColumn::make('name')->label('Full Name'),
                TextColumn::make('student_id')->label('Student ID'),
                TextColumn::make('department'),
                TextColumn::make('course'),

            ])

            ->filters([
                // ...
            ])
            ->actions([
                Action::make('view')
                    ->url(fn (User $record): string => route('record', $record))
            ])
            ->bulkActions([
                // ...
            ])
            ->emptyStateHeading('No application')
            ->emptyStateDescription('No pending application at the moment')
            ;
    }
}
