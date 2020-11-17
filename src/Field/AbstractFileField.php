<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

abstract class AbstractFileField implements FieldInterface
{
    use FieldTrait;

    public const OPTION_BASE_PATH = 'basePath';

    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new static())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(FileUploadType::class)
            ->setTextAlign('center')
            ->setCustomOption(self::OPTION_BASE_PATH, null);
    }

    public function setBasePath(string $path): self
    {
        $this->setCustomOption(self::OPTION_BASE_PATH, $path);
        $this->setFormTypeOption('upload_dir', $path);

        return $this;
    }
}
