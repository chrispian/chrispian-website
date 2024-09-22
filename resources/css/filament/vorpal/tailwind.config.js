import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-curator/resources/**/*.blade.php',
        '/vendor/awcodes/overlook/resources/**/*.blade.php',
        '/vendor/awcodes/filament-tiptap-editor/resources/**/*.blade.php',

    ],
}
