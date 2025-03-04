<img src="https://banners.beyondco.de/Laravel%20Flatfox.png?theme=light&packageManager=composer+require&packageName=codebar-ag%2Flaravel-flatfox&pattern=circuitBoard&style=style_2&description=A+Laravel+Flatfox+integration+to+receive+public+listings.&md=1&showWatermark=1&fontSize=150px&images=home&widths=500&heights=500">

This package was developed to give you a quick start to receive public listings from the Flatfox API.

## 💡 What is Flatfox?

Flatfox is a web-based portal where you can Search & advertise apartments for free.

## 🛠 Requirements

| Package 	 | PHP 	       | Laravel 	 | Flatfox 	 |
|-----------|-------------|-----------|-----------|
| v12.0.0   | ^8.2 - ^8.4 | 12.x      | ✅         |
| v11.0.0   | ^8.2        | 11.x      | ✅         |
| v1.0.0    | ^8.2        | 10.x      | ✅         |

## ⚙️ Installation

You can install the package via composer:

```bash
composer require codebar-ag/laravel-flatfox
```

## Usage

```php
    $request = new GetPublicListing(identifier: 142);
    $response = $request->send();
    
    $status = $request->status();
    $dto = $request->dto(); 

```

## 🏋️ DTO showcase

```php
CodebarAg\Flatfox\DTO\Listing {
  +pk: int|null
  +slug: string|null
  +url: array|null
  +short_url: string|null
  +submit_url: array|null
  +status: string|null
  +offer_type: string|null
  +object_category: string|null
  +object_type: string|null
  +reference: string|null
  +ref_property: string|null
  +ref_house: string|null
  +ref_object: string|null
  +alternative_reference: string|null
  +price_display: int|null
  +price_display_type: string|null
  +price_unit: string|null
  +rent_net: int|null
  +rent_charges: int|null
  +rent_gross: int|null
  +short_title: string|null
  +public_title: string|null
  +pitch_title: string|null
  +description_title: string|null
  +description: string|null
  +surface_living: int|null
  +surface_property: int|null
  +surface_usable: int|null
  +surface_usable_minimum: int|null
  +volume: int|null
  +space_display: int|null
  +number_of_rooms: string|null
  +floor: int|null
  +attributes: Collection DTO/Attribute|null
  +is_furnished: boolean|null
  +is_temporary: boolean|null
  +is_selling_furniture: boolean|null
  +street: string|null
  +zipcode: int|null
  +city: string|null
  +public_address: string|null
  +latitude: float|null
  +longitude: float|null
  +year_built: int|null
  +year_renovated: int|null
  +moving_date_type: string|null
  +moving_date: Carbon|null
  +video_url: string|null
  +tour_url: string|null
  +website_url: string|null
  +live_viewing_url: string|null
  +cover_image: int|null
  +images: Collection DTO/Image|null
  +documents: Collection DTO/Documenent|null
  +agency: DTO/Agency|null
  +reserved: boolean|null
  +livingspace: boolean|null
  +published: Carbon|null
  +created: Carbon|null
```

```php
CodebarAg\Flatfox\DTO\Attribute {
  +name: string|null
  +name_2: string|null
  +street: string|null
  +zipcode: string|null
  +city: string|null
  +country: string|null
  +logo_url: string|null
  +logo_url_org_logo_m: string|null
```

```php
CodebarAg\Flatfox\DTO\Agency {
  +name: string|null
```

```php
CodebarAg\Flatfox\DTO\Image {
  +pk: int|null
  +caption: string|null
  +url: string|null
  +url_thumb_m: string|null
  +url_listing_search: string|null
  +search_url: string|null
  +ordering:  int|null
  +width: int|null
  +height: int|null
```

```php
CodebarAg\Flatfox\DTO\Document {
  +pk: int|null
  +url: string|null
  +ordering:  int|null
  +caption: sting|null
```

## 🚧 Testing

Copy your own phpunit.xml-file.

```bash
cp phpunit.xml.dist phpunit.xml
```

Run the tests:

```bash
./vendor/bin/pest
```

## 📝 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## ✏️ Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

```bash
composer test
```

### Code Style

```bash
./vendor/bin/pint
```

## 🧑‍💻 Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## 🙏 Credits

- [Sebastian Fix](https://github.com/StanBarrows)
- [All Contributors](../../contributors)
- [Skeleton Repository from Spatie](https://github.com/spatie/package-skeleton-laravel)
- [Laravel Package Training from Spatie](https://spatie.be/videos/laravel-package-training)

## 🎭 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
