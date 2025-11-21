# GunitaPlugin

Welcome to **GunitaPlugin**, your go-to WordPress plugin boilerplate. Crafted to leverage the latest dev tools in WordPress plugin development, this boilerplate is designed to empower you to create dynamic, feature-rich, and robust plugins with ease. This is not just another boilerplate; it's your head start in the competitive WordPress plugin development landscape.

## Features

- Modern JavaScript/TypeScript development with webpack via @wordpress/scripts
- React support built-in for component development
- Plain CSS with custom properties (CSS variables) design system, processed by PostCSS
- PHP with namespaces and autoloading (PSR-4)
- Comprehensive testing setup for both PHP (PHPUnit) and JavaScript (Jest)
- Code quality tools (PHPStan, PHPCS, ESLint, Stylelint)
- Built-in development environment using @wordpress/env
- No CSS framework dependencies

## Requirements

- PHP 7.4 or higher
- Node.js 18 or higher
- pnpm 10.22.0 (or npm/yarn as alternatives)
- Composer 2.x

## Getting Started

**Important**: Before starting with the setup, make sure to replace the placeholder code strings throughout the boilerplate with your actual plugin's specific strings. Here's a list of strings to be replaced:

- `GUNITA_PLUGIN`
- `GunitaPlugin`
- `gunita-plugin`
- `gunita_plugin`

Use a text search and replace tool in your code editor to handle this efficiently.

### Setup

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/pkvillanueva/gunita-plugin.git
   cd gunita-plugin
   ```

2. **Install Dependencies**:

   Install PHP dependencies:
   ```bash
   composer install
   ```

   Install JavaScript dependencies:
   ```bash
   pnpm install
   ```

3. **Start the Environment**:
   Using `wp-env`, fire up your WordPress environment:
   ```bash
   pnpm run env:start
   ```

   This will initialize a Docker container with a WordPress installation. You can then visit the WordPress site in your browser.

4. **Development**:
   For active development with hot-reloading of JavaScript and CSS:
   ```bash
   pnpm start
   ```

5. **Building for Production**:
   Compile and optimize your plugin for production use (handles both JavaScript and CSS):
   ```bash
   pnpm run build
   ```

   The build process uses @wordpress/scripts which compiles TypeScript, bundles JavaScript, processes CSS (autoprefixing), and optimizes assets for production.

## Available Commands

### JavaScript/Asset Commands

- `pnpm run env:start`: Start the WordPress environment
- `pnpm run env:stop`: Stop the WordPress environment
- `pnpm start`: Start the development environment with hot-reloading
- `pnpm run build`: Build assets for production
- `pnpm run format`: Auto-format your code for consistency
- `pnpm run lint:css`: Lint CSS files
- `pnpm run lint:js`: Lint JavaScript files
- `pnpm run lint:pkg-json`: Lint package.json file
- `pnpm run test:js`: Run JavaScript unit tests
- `pnpm run test:js:watch`: Run JavaScript tests in watch mode
- `pnpm run test:php`: Run PHP unit tests (requires wp-env to be running; uses dynamic plugin path detection)
- `pnpm test`: Run both JavaScript and PHP tests
- `pnpm run plugin-zip`: Generate a zipped version of your plugin

### PHP Commands

- `composer analyze`: Run PHPStan static analysis
- `composer lint`: Run PHPCS linting
- `composer lint:fix`: Auto-fix PHPCS issues

### Git Hooks

This plugin uses Husky for automated git hooks:

- **Pre-commit**: Automatically formats staged files using lint-staged
- **Commit-msg**: Validates commit messages follow conventional commit format using commitlint

The hooks are automatically installed when you run `pnpm install`.

## Testing

This plugin includes a simplified testing setup for both PHP and JavaScript code, using WordPress's official test framework and @wordpress/env.

### PHP Testing

The PHP test suite uses PHPUnit with WordPress's official test framework (`WP_UnitTestCase`), running inside the @wordpress/env Docker environment. The test script automatically detects your plugin's folder name, so no configuration is needed when you clone or rename the project.

#### Prerequisites

Make sure the WordPress environment is running:

```bash
pnpm run env:start
```

**Note**: The `test:php` script uses `wp-env run tests-cli` to execute PHPUnit tests inside the WordPress Docker environment. The script automatically detects your plugin's folder name using shell substitution, which works on macOS, Linux, and Windows WSL/Git Bash. If you're using Windows CMD/PowerShell, you may need to update the script in `package.json` to hardcode your plugin folder name.

#### Run all PHP tests

```bash
pnpm run test:php
```

#### PHP test structure

- **Test files location**: `tests/php/` (PHP test files)
- **Bootstrap file**: `tests/php/bootstrap.php`
- **Configuration**: `phpunit.xml.dist`

Test files should be prefixed with `test-` (e.g., `test-plugin.php`). JavaScript tests are kept separate in `tests/js/`.

#### Writing PHP tests

Example test class:

```php
<?php
class Test_Plugin extends WP_UnitTestCase {

    public function test_plugin_loads() {
        // Test with real WordPress functions
        $this->assertTrue( defined( 'GUNITA_PLUGIN_VERSION' ) );
        $this->assertTrue( has_action( 'init' ) !== false );
    }
}
```

Tests extend `WP_UnitTestCase` which provides access to all WordPress functions and a test database.

### JavaScript/TypeScript Testing

The JavaScript test suite uses Jest via @wordpress/scripts with TypeScript support.

#### Run all JavaScript tests

```bash
pnpm run test:js
```

#### Run JavaScript tests in watch mode

```bash
pnpm run test:js:watch
```

#### JavaScript test structure

- **Test files location**: `tests/js/` (JavaScript/TypeScript tests)
- **Configuration**: `jest.config.js`
- **Supported file patterns**: `tests/js/**/*.test.[jt]s?(x)`

PHP tests are kept separate in the `tests/php/` directory.

#### Writing JavaScript tests

Example test file:

```typescript
import { add } from '../../assets/js/shared/utils';

describe( 'Utility Functions', () => {
    it( 'should add two numbers', () => {
        expect( add( 2, 3 ) ).toBe( 5 );
    } );
} );
```

### Running all tests

To run both PHP and JavaScript tests together:

```bash
pnpm test
```

This will run JavaScript tests first, then PHP tests (requires wp-env to be running).

## Project Structure

```
.
├── assets/              # Source files
│   ├── css/            # Stylesheets (plain CSS)
│   │   ├── admin/      # Admin styles
│   │   ├── frontend/   # Frontend styles
│   │   └── shared/     # Shared styles with CSS custom properties
│   ├── js/             # JavaScript/TypeScript
│   │   ├── admin/      # Admin scripts
│   │   ├── frontend/   # Frontend scripts
│   │   └── shared/     # Shared utilities
│   ├── fonts/          # Custom fonts
│   └── images/         # Image assets
├── build/              # Built assets (generated by webpack)
├── coverage/           # Test coverage reports (generated)
├── languages/          # Translation files
├── src/                # PHP source files
│   └── classes/        # PHP class files with PSR-4 autoloading
│       ├── Admin/          # Admin-specific classes
│       │   └── Setup.php   # Admin hooks and functionality
│       ├── Traits/         # Reusable traits
│       │   └── Singleton.php # Singleton pattern implementation
│       ├── Asset.php       # Asset enqueueing helper
│       ├── Install.php     # Plugin activation handler
│       ├── Setup.php       # Main plugin setup
│       └── Uninstall.php   # Plugin uninstall handler
├── tests/              # Test files
│   ├── js/             # JavaScript/TypeScript unit tests
│   └── php/            # PHP tests directory
│       ├── bootstrap.php  # PHP test bootstrap
│       └── test-*.php     # PHP test files
├── vendor/             # Composer dependencies (generated)
├── node_modules/       # npm dependencies (generated)
├── composer.json       # PHP dependencies
├── jest.config.js      # Jest configuration
├── package.json        # JavaScript dependencies and scripts
├── phpcs.xml           # PHP_CodeSniffer configuration
├── phpstan.neon        # PHPStan configuration
├── phpunit.xml.dist    # PHPUnit configuration
├── plugin.php          # Main plugin file
├── tsconfig.json       # TypeScript configuration
└── webpack.config.js   # Webpack configuration (extends @wordpress/scripts)
```

## Plugin Architecture

### PHP

The plugin uses a modern PHP architecture with:

- **Namespaces**: All PHP code is namespaced under `GunitaPlugin`
- **Autoloading**: PSR-4 autoloading via Composer
- **Separation of concerns**: Separate classes for admin and public functionality
- **Hooks pattern**: WordPress hooks are registered via `register_hooks()` methods

### JavaScript/TypeScript

The JavaScript code uses:

- **TypeScript**: Full TypeScript support for type safety
- **Modern ES6+**: Arrow functions, async/await, modules
- **Webpack**: Module bundling with @wordpress/scripts
- **React support**: Built-in support for React components

### CSS Architecture

The plugin uses modern CSS with a custom properties (CSS variables) design system, avoiding the complexity of CSS frameworks:

- **Plain CSS**: Write standard CSS without learning Sass/Less/Stylus syntax
- **PostCSS processing**: CSS is processed by PostCSS (via @wordpress/scripts) for autoprefixing and modern CSS feature support
- **Design tokens**: Comprehensive set of CSS custom properties for consistency
- **Shared variables**: All design tokens defined in `assets/css/shared/shared.css`

#### Available Design Tokens

**Colors:**
- Brand colors: `--gunita-color-primary`, `--gunita-color-secondary`, `--gunita-color-accent`
- Semantic colors: `--gunita-color-success`, `--gunita-color-warning`, `--gunita-color-error`, `--gunita-color-info`
- Neutral colors: `--gunita-color-text`, `--gunita-color-text-light`, `--gunita-color-border`, `--gunita-color-background`, `--gunita-color-background-alt`

**Spacing:**
- Scale from `--gunita-spacing-xs` (4px) to `--gunita-spacing-2xl` (48px)

**Typography:**
- Font families: `--gunita-font-family-base`, `--gunita-font-family-mono`
- Font sizes: `--gunita-font-size-xs` through `--gunita-font-size-3xl`
- Font weights: `--gunita-font-weight-normal` through `--gunita-font-weight-bold`
- Line heights: `--gunita-line-height-tight`, `--gunita-line-height-normal`, `--gunita-line-height-relaxed`

**UI Elements:**
- Border radius: `--gunita-radius-sm` through `--gunita-radius-full`
- Shadows: `--gunita-shadow-sm`, `--gunita-shadow-md`, `--gunita-shadow-lg`
- Transitions: `--gunita-transition-fast`, `--gunita-transition-base`, `--gunita-transition-slow`
- Z-index scale: `--gunita-z-index-dropdown` through `--gunita-z-index-tooltip`

#### Usage Example

```css
.my-component {
    padding: var(--gunita-spacing-md);
    color: var(--gunita-color-text);
    background: var(--gunita-color-background);
    border-radius: var(--gunita-radius-md);
    box-shadow: var(--gunita-shadow-sm);
    transition: all var(--gunita-transition-base);
}
```

## Best Practices

This plugin follows WordPress and industry best practices:

- ✅ Late escaping of output
- ✅ Validation and sanitization of input
- ✅ Nonce verification for form submissions
- ✅ Internationalization ready
- ✅ Semantic versioning
- ✅ Code documentation
- ✅ Unit testing
- ✅ Type safety with TypeScript
- ✅ Accessibility considerations

## Contributing

Your contributions are always welcome! Whether it's bug fixes, feature additions, or even documentation improvements, your inputs are the key to the boilerplate's growth.

Please ensure:

1. All tests pass: `pnpm test`
2. Code is linted: `composer lint && pnpm run lint`
3. Code follows WordPress coding standards
4. Write tests for business logic and complex functionality
5. Documentation is updated

## License

GPL v2 or later

## Support

For support, please open an issue on the GitHub repository or contact hello@gunita.dev

## Credits

Developed by [Gunita](https://gunita.dev)
