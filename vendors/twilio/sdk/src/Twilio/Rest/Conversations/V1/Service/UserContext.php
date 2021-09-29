<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class UserContext extends InstanceContext {
    /**
     * Initialize the UserContext
     *
     * @param Version $version Version that contains the resource
     * @param string $chatServiceSid The SID of the Conversation Service to fetch
     *                               the resource from
     * @param string $sid The SID of the User resource to fetch
     */
    public function __construct(Version $version, $chatServiceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['chatServiceSid' => $chatServiceSid, 'sid' => $sid, ];

        $this->uri = '/Services/' . \rawurlencode($chatServiceSid) . '/Users/' . \rawurlencode($sid) . '';
    }

    /**
     * Update the UserInstance
     *
     * @param array|Options $options Optional Arguments
     * @return UserInstance Updated UserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): UserInstance {
        $options = new Values($options);

        $data = Values::of([
            'FriendlyName' => $options['friendlyName'],
            'Attributes' => $options['attributes'],
            'RoleSid' => $options['roleSid'],
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new UserInstance(
            $this->version,
            $payload,
            $this->solution['chatServiceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Delete the UserInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('DELETE', $this->uri);
    }

    /**
     * Fetch the UserInstance
     *
     * @return UserInstance Fetched UserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): UserInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new UserInstance(
            $this->version,
            $payload,
            $this->solution['chatServiceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Conversations.V1.UserContext ' . \implode(' ', $context) . ']';
    }
}