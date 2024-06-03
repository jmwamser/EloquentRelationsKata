<?php

namespace App\Filament\Resources;

use App\Enum\FrequencyEnum;
use App\Filament\Resources\ChoreResource\Pages;
use App\Filament\Resources\ChoreResource\RelationManagers\UserResourceRelationManager;
use App\Models\Chore;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ChoreResource extends Resource
{
    protected static ?string $model = Chore::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('created_by')
                    ->integer()
//                    ->relationship('creator', 'name')
//                    ->searchable()
//                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('reward_points')
                    ->required()
                    ->integer(),
                Forms\Components\Select::make('frequency')
                    ->enum(FrequencyEnum::class) // Used for Validation
                    ->options(FrequencyEnum::selectOptions())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reward_points')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('frequency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
//            UserResourceRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChores::route('/'),
            'create' => Pages\CreateChore::route('/create'),
            'edit' => Pages\EditChore::route('/{record}/edit'),
        ];
    }
}
