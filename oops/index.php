<?php

require "Autoload.php";

// Instance of manager class
$manager = new Manager();

############################### Initialize type classes #############################
$anesthetistObj = $manager->setClass('anesthetist');
$specialistObj = $manager->setClass('specialist');
$sessionObj = $manager->setClass('session');
$orObj = $manager->setClass('operating room');
$datetime = new \DateTime();

############################## Initialize session class ##############################
// Clone new session object
$sessionNewObj = clone $sessionObj;

// Initialize session
$sessionNewObj
    // Set specialist
    ->setSpecialist(clone $specialistObj->setName('Specialist1'))
    // Add anesthetist
    ->addAnesthetist(clone $anesthetistObj->setName('Anesthetist1'))
    ->addAnesthetist(clone $anesthetistObj->setName('Anesthetist2'))
    ->addAnesthetist(clone $anesthetistObj->setName('Anesthetist3'))
    // Add operating rooms
    ->addOperatingRoom(clone $orObj->setName('OR1'))
    ->addOperatingRoom(clone $orObj->setName('OR2'))
    ->addOperatingRoom(clone $orObj->setName('OR3'));

####################### Initialize Operating Room class ###############################
// Clone new OR object
$orNewObj = clone $orObj;
// Set operating room
$orNewObj
    ->addSession(clone $sessionNewObj->setName('Ses1'))
    ->addSession(
        clone $sessionNewObj
            ->setName('Ses2')
            ->setSpecialist(clone $specialistObj->setName('Specialist2'))
    )
    ->addSession(
        clone $sessionNewObj
            ->setName('Ses3')
            ->setSpecialist(clone $specialistObj->setName('Specialist3'))
    );
?>
<br/>
<hr/>
<strong>Question
    3:- Write an object oriented method in PHP that gives an overview of the sessions and the specialists and the
    anesthetists that are scheduled per OR.
</strong>
<br/>
<hr/>
<strong>Answer:-</strong><br/>
<table width="100%" border="1">
    <?php foreach ($orNewObj->getSessions() as $key => $session): ?>
        <tr>
            <td>
                <strong>
                    Session Name:-
                </strong><?php echo $session->getName(); ?>
            </td>
            <td>
                <table width="100%">
                    <tr>
                        <td colspan="2" style="border-bottom: 1px solid;">
                            <strong>
                                Specialist:-
                            </strong> <?php echo $session->getSpecialist()->getName(); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Anesthetists:-
                            </strong>
                            <hr/>
                            <?php
                            foreach ($session->getAnesthetists() as $anesthetist):
                                echo '- ' . $anesthetist->getName() . '<br>';
                            endforeach;
                            ?>
                        </td>
                        <td>
                            <strong>
                                Operating Rooms:-
                            </strong>
                            <hr/>
                            <?php
                            foreach ($session->getOperatingRooms() as $operatingRoom):
                                echo '- ' . $operatingRoom->getName() . '<br>';
                            endforeach;
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
####################### Initialize Specialist class ###############################
// Clone new OR object
$specialistNewObj = clone $specialistObj;
// Set operating room
$specialistNewObj
    ->setName('Specialist1')
    ->addSession(
        clone $sessionNewObj
            ->setName('Session1')
            ->setFrom(clone $datetime->setTime(7, 30))
            ->setTo(clone $datetime->setTime(8, 30))
    )
    ->addSession(
        clone $sessionNewObj
            ->setName('Session2')
            ->setFrom(clone $datetime->setTime(9, 30))
            ->setTo(clone $datetime->setTime(10, 30))
    );
?>
<br/>
<hr/>
<strong>Question
    4:- Write an object oriented method in PHP that gives an overview of the sessions and OR’s of a specific specialist.
</strong>
<br/>
<hr/>
<strong>Answer:-</strong><br/>
<table width="100%" border="1">
    <tr>
        <td>
            <strong>
                Specialist Name:-
            </strong><?php echo $specialistNewObj->getName(); ?>
        </td>
        <td>
            <table width="100%">
                <tr>
                    <td style="border-bottom: 1px solid;">
                        <table width="100%">


                            <?php foreach ($specialistNewObj->getSessions() as $session): ?>
                                <tr>
                                    <td>

                                        <strong>Session Name:-</strong> <?php echo $session->getName(); ?><br/>
                                        <strong>Session
                                            From:-</strong> <?php echo $session->getFrom()->format('Y-m-d H:i'); ?>
                                        <strong>To</strong>
                                        <?php echo $session->getTo()->format('Y-m-d H:i'); ?>
                                    </td>
                                    <td>
                                        <strong>
                                            Operating Rooms:-
                                        </strong>
                                        <hr/>
                                        <?php
                                        foreach ($session->getOperatingRooms() as $operatingRoom):
                                            echo '- ' . $operatingRoom->getName() . '<br>';
                                        endforeach;
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>


<?php
####################### Checking availabilities of specialist ###############################
$from = clone $datetime->setTime(8, 45);
$to = clone $datetime->setTime(9, 15);
?>
<br/>
<hr/>
<strong>Question
    5:- Write an object oriented method in PHP that checks if a specialists available in a certain timeslot. Do not
    write a query, but use the objects you have created.
</strong>
<br/>
<hr/>
<strong>Answer:-</strong><br/>
<table width="100%" border="1">
    <tr>
        <td>
            <strong>
                Specialist Name:-
            </strong><?php echo $specialistNewObj->getName(); ?>
        </td>
        <td>
            <table width="100%">
                <tr>
                    <td style="border-bottom: 1px solid;">
                        Check Availability from <strong> (<?php echo $from->format('H:i')?> - <?php echo $to->format('H:i')?>)</strong>
                    </td>
                </tr>
                <?php if (!$specialistNewObj->checkAvailability($from, $to)): ?>
                    <tr>
                        <td style="color: green;">
                            <strong> Yes, specialist is available</strong>
                        </td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td style="color: red;">
                            <strong> No, specialist is not available</strong>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
        </td>
    </tr>
</table>