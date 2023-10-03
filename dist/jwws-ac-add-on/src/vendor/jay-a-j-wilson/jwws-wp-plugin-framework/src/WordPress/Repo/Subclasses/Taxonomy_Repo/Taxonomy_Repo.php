<?php
/**
 * @license proprietary?
 *
 * Modified by __root__ on 03-October-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare(strict_types=1);

namespace JWWS\ACA\Deps\JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo;

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
final class Taxonomy_Repo extends Repo {
    /**
     * Returns an object collection of all registered taxonomies.
     *
     * @return Collection<\WP_Taxonomy>
     */
    public function list_all(): Collection {
        return Standard_Collection::of(
            ...get_taxonomies(output: 'objects'),
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function find_by_name(string $name): \WP_Taxonomy {
        WordPress_Slug_Assertion::of(slug: $name)->is_valid();

        $taxonomies = get_taxonomies(
            args: ['name' => $name],
            output: 'objects',
        );

        Array_Assertion::of(array: $taxonomies)
            ->is_not_empty(message: "Taxonomy type '{$name}' not found.")
        ;

        return $taxonomies[$name];
    }
}
