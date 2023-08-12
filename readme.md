# GunitaPlugin

Welcome to **GunitaPlugin**, your go-to WordPress plugin boilerplate. Crafted to leverage the latest dev tools in WordPress plugin development, this boilerplate is designed to empower you to create dynamic, feature-rich, and robust plugins with ease. This is not just another boilerplate; it's your head start in the competitive WordPress plugin development landscape.

## Getting Started

**Important**: Before starting with the setup, make sure to replace the placeholder code strings throughout the boilerplate with your actual plugin's specific strings. Here's a list of strings to be replaced:

- `GUNITA_PLUGIN`
- `GunitaPlugin`
- `gunita-plugin`
- `gunita_plugin`

Use a text search and replace tool in your code editor to handle this efficiently.

### Setup

1. **Clone the Repository**:
   ```
   git clone https://github.com/your-repo-url/gunita-plugin.git
   cd gunita-plugin
   ```

2. **Install Dependencies**:
   Using Node's package manager:
   ```
   npm install
   ```

   For Composer dependencies (if any):
   ```
   composer install
   ```

3. **Start the Environment**:
   Using `wp-env`, fire up your WordPress environment:
   ```
   npm run env:start
   ```

   This will initialize a Docker container with a WordPress installation. You can then visit the WordPress site in your browser.

4. **Development**:
   For active development with hot-reloading:
   ```
   npm start
   ```

5. **Building for Production**:
   Compile and optimize your plugin for production use:
   ```
   npm run build
   ```

## Available Commands

- `npm run env:start`: Start the WordPress environment.
- `npm run env:stop`: Stop the WordPress environment.
- `npm start`: Start the development environment with hot-reloading.
- `npm run build`: Build assets for production.
- `npm run format`: Auto-format your code for consistency.
- `npm run lint:css`: Lint CSS files.
- `npm run lint:js`: Lint JavaScript files.
- `npm run lint:pkg-json`: Lint `package.json` file.
- `npm test`: Run unit tests.
- `npm run plugin-zip`: Generate a zipped version of your plugin.

## Contributing

Your contributions are always welcome! Whether it's bug fixes, feature additions, or even documentation improvements, your inputs are the key to the boilerplate's growth.
