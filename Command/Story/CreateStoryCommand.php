<?php
declare(strict_types=1);

namespace Ria\Bundle\PostBundle\Command\Story;

use Symfony\Component\Validator\Constraints as Assert;

class CreateStoryCommand
{
    /**
     * @var bool
     * @Assert\Type("boolean")
     */
    public bool $status;

    /**
     * @var bool
     * @Assert\Type("boolean")
     */
    public bool $showOnSite;

    /**
     * @var array StoryTranslationCommand
     */
    public array $translations;

    public function __construct(array $locales)
    {
        $translations = [];

        foreach ($locales as $locale) {
            $translations[$locale] = new StoryTranslationCommand($locale);
        }

        $this->translations = $translations;
    }

}