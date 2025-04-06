<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers\PostsRelationManager;
use App\Models\Category;
use App\Models\Post;
use Awcodes\Curator\Components\Forms\CuratorEditor;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Closure;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Str;
use Spatie\FilamentMarkdownEditor\MarkdownEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = "Content";

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make()
                    ->schema([
                        TextInput::make('title')
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                if (! $get('is_slug_changed_manually') && filled($state)) {
                                    $set('slug', Str::slug($state));
                                }
                            })
                            ->reactive()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->afterStateUpdated(function (Set $set) {
                                $set('is_slug_changed_manually', true);
                            })
                            ->required(),
                        Hidden::make('is_slug_changed_manually')
                              ->default(false)
                              ->dehydrated(false),
                        MarkdownEditor::make('summary')
                            ->required(),

                        MarkdownEditor::make('content')
                            // ->profile('default')
                            // ->tools([]) // individual tools to use in the editor, overwrites profile
                            // ->disk('string') // optional, defaults to config setting
                            // ->directory('string or Closure returning a string') // optional, defaults to config setting
                            // ->acceptedFileTypes(['array of file types']) // optional, defaults to config setting
                            // ->maxFileSize('integer in KB') // optional, defaults to config setting
                            // ->output(TiptapOutput::Html) // optional, change the format for saved data, default is html
                            // ->maxContentWidth('5xl')
                            ->required(),

                        Repeater::make('related_posts')
                            ->schema([
                                Select::make('related_post')
                                    ->options(Post::all()->pluck('title', 'id'))
                                    ->searchable()
                            ])->columns(1),

                    ])
                    ->columns(1)->columnSpan(9),

                Grid::make()
                    ->schema([
//                        FileUpload::make('cover_image')
//                            ->image(),
//                    CuratorPicker::make('cover_image')
//                       ->size('lg'), // defaults to md
                    SpatieMediaLibraryFileUpload::make('cover_image')
                        ->collection('cover_image')
                        ->responsiveImages(),
                    Select::make('author_id')
                        ->relationship('author', 'name')
                        ->required()
                        ->default('1'),
                    Select::make('status')
                        ->required()
                        ->options([
                            'Draft' => 'Draft',
                            'Published' => 'Published',
                        ])->default('Draft'),
                    Select::make('project_id')
                          ->relationship('project', 'title'),
                    Select::make('series_id')
                          ->relationship('series', 'title'),
                    Select::make('categories')
                        ->relationship('categories', 'title')
                        ->noSearchResultsMessage('No categories...')
                        ->multiple()
                        ->preload()
                        ->optionsLimit(6)
                        ->createOptionForm(
                            PostCategoryResource::getFormSchema()
                        )
                        ->createOptionUsing(function (array $data, \Filament\Forms\Components\Select $component) {
                            // Create the account manually
                            $category = Category::create($data);

                            // Append to the current selected state
                            $state = $component->getState() ?? [];

                            // Ensure uniqueness and append the new key
                            $component->state([...$state, $category->getKey()]);
                            $component->callAfterStateUpdated();

                            // Return the ID of the new record — Filament will auto-select it
                            return $category->getKey('object_id');
                        })
                        ->required(),
                    SpatieTagsInput::make('tags')



                    ])->columns(1)->columnSpan(3),


            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order', '#')
                    ->toggleable()
                    ->sortable(),

                SpatieMediaLibraryImageColumn::make('cover_image')
                    ->size(40),
                TextColumn::make('author.name'),
                TextColumn::make('title'),
                TextColumn::make('summary'),
                TextColumn::make('status'),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
