<div class="small-box {{ ($wg_link_background)?$wg_link_background:"bg-aqua" }}">
  <div class="inner">
    <h3>{{ ($wg_link_value)?$wg_link_value:0 }}</h3>

    <p>{{ ($wg_link_title)?$wg_link_title:"Title" }}</p>
  </div>
  <div class="icon">
    <i class="ion ion-pie-graph"></i>
  </div>
  <a href="{{ ($wg_link_url)?$wg_link_url:"#" }}" class="small-box-footer">
    Lebih detil <i class="fa fa-arrow-circle-right"></i>
  </a>
</div>