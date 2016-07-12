<?php

namespace spec\PurpleBooth\PrioritisedDateRanges;

use DateTime;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use PurpleBooth\PrioritisedDateRanges\PriorityDateRange;

class PriorityDateRangeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PurpleBooth\PrioritisedDateRanges\PriorityDateRange');
    }

    function it_has_no_start_initially()
    {
        $this->hasStart()->shouldReturn(false);
    }

    function it_has_no_end_initially()
    {
        $this->hasEnd()->shouldReturn(false);
    }

    function it_can_be_given_an_arbitrary_value_as_an_id()
    {
        $this->setKey("an arbitrary value");
        $this->getKey()->shouldReturn("an arbitrary value");
    }

    function it_has_a_start_if_you_set_one()
    {
        $this->setStart(new DateTime());
        $this->hasStart()->shouldReturn(true);
    }

    function it_has_a_end_if_you_set_one()
    {
        $this->setEnd(new DateTime());
        $this->hasEnd()->shouldReturn(true);
    }

    function it_can_be_compared_to_other_date_ranges_contains()
    {
        $comparison = new PriorityDateRange();
        $comparison->setStart(new DateTime());
        $comparison->setEnd(new DateTime());

        $this->contains($comparison)->shouldReturn(PriorityDateRange::COMPARISON_CONAINED);
    }

    function it_can_be_compared_to_other_date_ranges_overlaps()
    {
        $comparison = new PriorityDateRange();

        $this->setStart(new DateTime());
        $this->setEnd(new DateTime());

        $this->contains($comparison)->shouldReturn(PriorityDateRange::COMPARISON_OVERLAPS_BOTH);
    }

    function it_can_be_compared_to_other_date_ranges_are_equal()
    {
        $comparison = new PriorityDateRange();

        $this->contains($comparison)->shouldReturn(PriorityDateRange::COMPARISON_EQUAL);
    }
}
