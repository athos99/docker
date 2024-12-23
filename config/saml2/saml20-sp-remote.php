<?php

/**
 * SAML 2.0 remote SP metadata for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */

$metadata['http://cmsadminfao.localhost/9949-fao/htdocs/public/saml/metadata'] = [
    'entityid' => 'http://cmsadminfao.localhost/9949-fao/htdocs/public/saml/metadata',
    'contacts' => [],
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'http://cmsadminfao.localhost/9949-fao/htdocs/public/saml/acs',
            'index' => 1,
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'http://cmsadminfao.localhost/9949-fao/htdocs/public/saml/logout',
        ],
    ],
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    'validate.authnrequest' => false,
    'saml20.sign.assertion' => false,
];

$metadata['http://localhost/9816-OBA-DG/htdocs/public/saml/metadata'] = [
    'entityid' => 'http://localhost/9816-OBA-DG/htdocs/public/saml/metadata',
    'contacts' => [],
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'http://localhost/9816-OBA-DG/htdocs/public/saml/acs',
            'index' => 1,
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'http://localhost/9816-OBA-DG/htdocs/public/saml/logout',
        ],
    ],
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    'validate.authnrequest' => false,
    'saml20.sign.assertion' => false,
];


$metadata['http://localhost:1082/composants/symfony-demo/htdocs/public/saml/metadata'] = [
    'entityid' => 'http://localhost:1082/composants/symfony-demo/htdocs/public/saml/metadata',
    'contacts' => [],
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'http://localhost:1082/composants/symfony-demo/htdocs/public/saml/acs',
            'index' => 1,
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'http://localhost:1082/composants/symfony-demo/htdocs/public/saml/logout',
        ],
    ],
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    'validate.authnrequest' => false,
    'saml20.sign.assertion' => false,
];

