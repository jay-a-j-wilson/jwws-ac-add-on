<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 07-August-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo;

use JWWS\ACA\Deps\JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion;
use JWWS\ACA\Deps\JWWS\WPPF\Assertion\WordPress_Assertion\Slug\Slug as WordPress_Slug_Assertion;
use JWWS\ACA\Deps\JWWS\WPPF\Collection\Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use JWWS\ACA\Deps\JWWS\WPPF\Common\Security\Security;
use JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Repo;

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class Post_Type_Repo extends Repo {
    /**
     * @return Collection<\WP_Post_Type>
     */
    public function list_all(): Collection {
        return Standard_Collection::of(
            ...get_post_types(output: 'objects'),
        );
    }

    /**
     * @throws \InvalidArgumentException if not found
     */
    public function find_by_name(string $name): \WP_Post_Type {
        WordPress_Slug_Assertion::of(slug: $name)->is_valid();

        $post_types = get_post_types(
            args: ['name' => $name],
            output: 'objects',
        );

        Array_Assertion::of(array: $post_types)
            ->is_not_empty(message: "Post type '{$name}' not found.")
        ;

        return $post_types[$name];
    }
}
