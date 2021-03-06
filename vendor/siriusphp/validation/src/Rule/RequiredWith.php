<?php
declare(strict_types=1);
namespace Sirius\Validation\Rule;

class RequiredWith extends Required
{
    const OPTION_ITEM = 'item';

    const MESSAGE = 'This field is required';
    const LABELED_MESSAGE = '{label} is required';

    protected $optionsIndexMap = [
        0 => self::OPTION_ITEM
    ];

    public function validate($value, string $valueIdentifier = null):bool
    {
        $this->value = $value;

        $relatedItemPath  = $this->getRelatedValueIdentifier($valueIdentifier, $this->options[self::OPTION_ITEM]);
        $relatedItemValue = $relatedItemPath !== null ? $this->context->getItemValue($relatedItemPath) : null;

        if (isset($this->options[self::OPTION_ITEM]) && $relatedItemValue !== null) {
            $this->success = ($value !== null && trim((string)$value) !== '');
        } else {
            $this->success = true;
        }

        return $this->success;
    }
}
