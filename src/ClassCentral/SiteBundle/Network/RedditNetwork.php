<?php
namespace ClassCentral\SiteBundle\Network;

use ClassCentral\SiteBundle\Network\NetworkAbstractInterface;
use ClassCentral\SiteBundle\Entity\Offering;

class RedditNetwork extends NetworkAbstractInterface
{
    public function outInitiative( $initiative , $offeringCount)
    {
        $this->output->writeln( strtoupper($initiative) . "({$offeringCount})");
        $this->output->writeln('');
               
    }

    public function beforeOffering()
    {
        // Table header row
        $this->output->writeln("Course Name|Start Date|Length");
        $this->output->writeln(":--|:--:|:--:");
    }


    public function outOffering(Offering $offering)
    {
        $name = '[' . $offering->getName(). ']' . '(' . $offering->getUrl() . ')'; 

        $startDate = 'NA';
        if($offering->getStatus() == Offering::START_DATES_KNOWN)
        {
            $startDate = $offering->getStartDate()->format('M jS');
        }
        else if ( $offering->getStatus() == Offering::COURSE_OPEN)
        {
            $startDate = 'Open Entrollment';
        }

        $length = 'NA';
        if(  $offering->getLength() != 0)
        {
            $length = $offering->getLength() . ' weeks';
        }

        $this->output->writeln("$name|$startDate|$length");
    } 

}


