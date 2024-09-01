<?php
          include "layout/header.php";
          ?>

<style>
#para{
    /* width: 800px; */
    padding: 50px;
    /* position: relative; */
    /* left: 550px; */
}
</style>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal text-body-emphasis">Pricing</h1>
      <p id ="para" class="fs-5 text-body-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque eum eius qui veritatis, sequi, minima omnis repellendus minus ea molestias Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque eum eius qui veritatis, sequi, minima omnis repellendusdolorem odio quaerat quo officiis nisi doloremque sint dolores repellat.</p>
   


    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Membership Starters</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$10<small class="text-body-secondary fw-light">/month</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Riverdale Customers only</li>
              <li>Charges for Door delivary</li>
              <li>Standard Packaging</li>
              <li>Charges for Packaging </li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="location.href='starter_form.php'">Get started</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Membership-Pro</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$25<small class="text-body-secondary fw-light">/month</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>All Customers</li>
              <li>Charges for Door delivary</li>
              <li>Priority delivary</li>
              <li>Charges for Packaging </li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="location.href='pro_form.php'">Get started</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h4 class="my-0 fw-normal">Advanced-Membership</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$199<small class="text-body-secondary fw-light">/year</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Riverdale Customers</li>
              <li> Free Door delivery</li>
              <li>Priority delivary</li>
              <li>No Charges for Packaging</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="location.href='advanced_form.php'">Get started</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container my-5">
  <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
    <h1 class="text-body-emphasis">Placeholder jumbotron</h1>
    <p class="col-lg-6 mx-auto mb-4">
      This faded back jumbotron is useful for placeholder content. It's also a great way to add a bit of context to a page or section when no content is available and to encourage visitors to take a specific action.
    </p>
    <button class="btn btn-primary px-5 mb-5" type="button">
      Call to action
    </button>
  </div>
</div>




<?php
          include "layout/footer.php";
          ?>