# mindbird/contao-ce-box

Custom box content elements for Contao with headlines, text, images and links.

## Requirements

- Contao 5.7 or later
- PHP 8.3 or later

## Installation

Install the bundle in your Contao project with Composer:

```bash
composer require mindbird/contao-ce-box
```

Then run the Contao database migration:

```bash
vendor/bin/contao-console contao:migrate
```

## Content elements

The bundle adds a **Boxes** category to the content element picker with the
following elements:

- **Box**: headline, slogan, text, image and optional link
- **Box (headline, text)**: headline, text and optional link
- **Box (headline, image)**: headline, image and optional link
- **Box - Start** and **Box - End**: wrapper elements for grouping content

Links can target either a selected Contao page or a manually entered URL.

## Support

Please report issues in the [GitHub issue tracker](https://github.com/mindbird/contao-ce-box/issues).
