# Laravel support attributes

Available attributes:
- [Required](#required)

## Installation
Install with composer
```bash
    composer require ikreydo/laravel-support-attributes
```
## Attributes description

### Required
Autowiring will automatically call any method with the `#[Required]` attribute above it, autowiring each argument.
Its analog symfony required attribute for laravel.

Example:
```php
class Example {
    private SomeDependency $someDependency;

    #[Required] #this function will be called automatically after class init
    public function dependencyInjection(SomeDependency $someDependency): void 
    {
        $this->someDependency = $someDependency;
    }
}
```