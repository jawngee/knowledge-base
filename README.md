# Clippy Knowledge Base

![logo](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBbBdtY0iJQNui3bbMXg_gk4n_JDAq7KaxMZPNgLaU21nB5XKh&s)

This is the knowledge base app being used on [Media Cloud Support](https://kb.mediacloud.press/).  

I built this out of frustration with the various feature starved help desk knowledge bases that we tested from a large number of help desk services.

This is a WordPress app, built using Bedrock/Trellis and the [Stem Application Framework](https://github.com/stem-press/stem).

## Requirements

* PHP >= 7.1
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* Python
* Ansible
* Vagrant
* Parallels or VirtualBox


## Development Setup
To install this for dev/testing:

1. Clone trellis:
    ```sh
    git clone https://github.com/jawngee/knowledge-base-trellis trellis
    rm -rf trellis/.git
    ```
2. Update the trellis config in `trellis/group_vars/all/vault.yml`:
   1. Set the `act_pro_key` to your ACF Pro license
   2. If you are using Crisp, set the `CRISP_TOKEN`, `CRISP_KEY`, `CRISP_BEACON_ID`, `RECAPTCHA_SITE` and `RECAPTCHA_SERVER` (You need to use Recaptcha v2)
3. Clone this repo:
    ```sh
    git clone https://github.com/jawngee/knowledge-base site
    rm -rf site/.git
    ```
4. Update composer deps:
    ```sh
    cd site
    composer update
    ```
5. Switch to the trellis directory:
    ```sh
    cd trellis
    ```
5. Install ansible.  I like to use Python's virtualenv for each Trellis project so that the ansible version is specific to the project:
    ```sh
    virtualenv ansible
    source ansible/bin/activate
    pip install ansible
    ```
6. If you are on macOS, you'll need to install passlib:
   ```sh
   pip install passlib
   ```
7. Vagrant up! (You cand drop the `--provider` part if you are not on macOS and do not have Parallels installed.  If you are on macOS and you aren't using Parallels, consider it because it is much faster that VirtualBox)
   ```sh
   vagrant up --provider=parallels
   ```
8. Grab a coffee
9. Once it's setup, you will be able to access it at [http://clippy.test/wp/wp-admin/](http://clippy.test/wp/wp-admin/) the login/pass is `admin` / `admin`

## WordPress Setup
Once you've logged into the admin:

1. Activate all the plugins
2. Activate the "Clippy" theme
3. Import the example data if you want

## Modifying the Theme CSS
The theme assets are located in the theme's `assets` folder.  In a terminal change to that directory and type `yarn` to install dependencies.  Once installed, you can:

* `npm run watch` - Starts browsersync for hot/live reloading
* `npm run dev` - To create a development build (includes .map's)
* `npm run production` - To create a production build (excludes .map's)

All of the javascript is built using typescript, jQuery is only used for ajax because I'm lazy.

##How The Theme Is Built
The theme is built using Stem, which is our in-house app framework for WordPress.  There is no formal documentation for it, though the source is liberally commented and the structure should make sense if you've ever worked with Laravel, Symfony or another MVC framework.

The top level directories in the theme:

* `assets` - Contains all the SCSS, TypeScript, images, fonts, etc.
* `classes` - Contains all the controllers, models, content models
* `config` - Stem is a very config heavy framework.  Each config file is heavily commented.
* `public` - All public assets compiled from the `assets` folder
* `views` - The Laravel blade templates for the entire site

The Stem framework itself is located in the `mu-plugins` directory and the Stem Content package is installed as a plugin.  The Stem Content package provides models for creating ACF Flexibly layout based admin very easily.  You'll see examples of it in the `classes/Content` directory.

Eventually we will document Stem, but trust that we use this on every site for our clients, including a whole bunch of Fortune 100 companies.

##Deploying to Production
For this, I'll refer you to the [Trellis documentation](https://roots.io/trellis/docs/remote-server-setup/).  It's actually very easy to get going and if you've only used cheap VPS's in the past, it's going to open a whole new set of doors for you.
