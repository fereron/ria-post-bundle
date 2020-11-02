<?php
declare(strict_types=1);

namespace Ria\Bundle\PostBundle\Form\Type\Story;

use Ria\Bundle\PostBundle\Command\Story\CreateStoryCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StoryType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', CheckboxType::class)
            ->add('showOnSite', CheckboxType::class)
            ->add('submit', SubmitType::class)
        ;

        $builder->add('translations', CollectionType::class, [
            'entry_type' => StoryTranslationType::class,
//            'entry_options' => ['label' => false],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreateStoryCommand::class,
        ]);
    }

}