<div class="row">
    <div class="col-12">
      <!-- Recent Order Table -->
      <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
          <h2>Recent Orders</h2>
          <div class="date-range-report">
            <span></span>
          </div>
        </div>
        <div class="pt-0 pb-5 card-body">
          <table
            class="table card-table table-responsive table-responsive-large"
            style="width: 100%"
          >
            <thead>
              <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th class="d-none d-md-table-cell">Created At</th>
                <th class="d-none d-md-table-cell">Updated At</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>
                    <a class="text-dark" href=""> {{$item->name}}</a>
                  </td>
                  <td class="d-none d-md-table-cell">{{$item->created_at}}</td>
                  <td class="d-none d-md-table-cell">{{$item->updated_at}}</td>
                  <td class="text-right">
                    <div
                      class=" dropdown show d-inline-block widget-dropdown"
                    >
                      <a
                        class="dropdown-toggle icon-burger-mini"
                        href=""
                        role="button"
                        id="dropdown-recent-order1"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        data-display="static"
                      ></a>
                      <ul
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="dropdown-recent-order1"
                      >
                        <li class="dropdown-item">
                          <a href="#">View</a>
                        </li>
                        <li class="dropdown-item">
                          <a href="#">Remove</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
