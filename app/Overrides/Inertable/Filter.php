<?php

namespace App\Overrides\Inertable;

use Illuminate\Support\Collection;

class Filter
{
    public const TYPE_DATE = 'date';

    public const TYPE_SELECT = 'select';

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $url;

    /**
     * @var string
     */
    public string $type;

    /**
     * @var array
     */
    public array $attributes = [];

    /**
     * @var Collection
     */
    public Collection $options;

    /**
     * Filter constructor.
     *
     * @param  string  $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param  string  $name
     * @return Filter
     */
    public static function make(string $name): self
    {
        return new static($name);
    }

    /**
     * @return $this
     */
    public function select(array $attributes = []): self
    {
        $this->type = self::TYPE_SELECT;

        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return $this
     */
    public function date(): self
    {
        $this->type = self::TYPE_DATE;

        return $this;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isSelect(): bool
    {
        return $this->type === self::TYPE_SELECT;
    }

    /**
     * @return bool
     */
    public function isDate(): bool
    {
        return $this->type === self::TYPE_DATE;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = ['options' => $attributes];

        return $this;
    }
}
