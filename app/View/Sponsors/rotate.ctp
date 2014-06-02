<?php

    // construct Google Map URL
    $gmap_url = 'https://maps.google.co.uk/?q=' . urlencode($sponsor['Sponsor']['address']);

    // determine link for the main image
    if (!empty($sponsor['Sponsor']['website_url'])) {
        $main_sponsor_url = $sponsor['Sponsor']['website_url'];
    } elseif (!empty($sponsor['Sponsor']['address'])) {
        $main_sponsor_url = $gmap_url;
    } else {
        $main_sponsor_url = '#';
    }

?>


<?php if($sponsor['Sponsor']['image_name']): ?>
<style type="text/css">

    .sponsor a.image {
        background-image:url(/img/sponsors/<?php echo $sponsor['Sponsor']['image_name']; ?>);
    }

</style>
<?php endif; //($sponsor['Sponsor']['image_name']): ?>

<h1>Thanks for logging on!</h1>
<p class="brought">Free WiFi brought to you by:</p>












<div class="sponsor">
    <p class="name"><?php echo $sponsor['Sponsor']['name']?></p>
    <a class="image" target="_blank" href="<?php echo $main_sponsor_url?>"></a>
    <p class="strap"><?php echo $sponsor['Sponsor']['strap']?></p>
    <ul class="sponsor-details">

<?php if (!empty($sponsor['Sponsor']['website_url'])): ?>
        <li>
            <a class="website" target="_blank" href="<?php echo $sponsor['Sponsor']['website_url']?>">View Website</a>
        </li>
<?php endif; // (!empty($sponsor['Sponsor']['website_url'])): ?>

<?php if (!empty($sponsor['Sponsor']['address'])): ?>
        <li>
            <a class="gmap" target="_blank" href="<?php echo $gmap_url?>">Show on map</a>
        </li>
<?php endif; // (!empty($sponsor['Sponsor']['website_url'])): ?>

<?php if (!empty($sponsor['Sponsor']['telephone'])): ?>
        <li>
            <a class="telephone" target="_blank" href="tel:<?php echo $sponsor['Sponsor']['telephone']?>">Call</a>
        </li>
<?php endif; // (!empty($sponsor['Sponsor']['telephone'])): ?>

    </ul>
    
</div>









<?php if (count($events)): ?>

<h2>Upcoming events in Hunstanton</h2>
<ul class="events">

<? foreach($events as $event): ?>
    <li>
        <h3><?php echo $this->Time->nice($event['Event']['start']) ?></h3>
        <h4><?php echo $event['Event']['title']?></h4>
        <h5><?php echo $event['Event']['location_name']?></h5>
        <p><?php echo $event['Event']['description']?></p>
    </li>

<? endforeach; //($events as $event): ?>

</ul>

<?php endif; // (count($events)): ?>