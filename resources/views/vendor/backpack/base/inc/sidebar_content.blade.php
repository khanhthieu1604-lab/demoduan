<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon la la-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- Users, Roles, Permissions -->
<li class="nav-title">Account Management</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-group"></i> <span>Roles</span></a></li>
@role('super-admin')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
@endrole

{{-- @if(backpack_user()->hasRole('admin')) --}}
{{-- @role('employer|admin|super-admin') --}}
<li class="nav-title">Advanced</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>

<li class="nav-title">Company Management</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('company') }}'><i class='nav-icon la la-building'></i> Companies</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('vihicle') }}'><i class='nav-icon la la-truck-pickup'></i> Vihicles</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('service') }}'><i class='nav-icon la la-servicestack'></i> Services</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('employer') }}'><i class='nav-icon la la-male'></i> Employers</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('brand') }}'><i class='nav-icon la la-atom'></i> Brands</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('driver') }}'><i class='nav-icon la la-universal-access'></i> Drivers</a></li>
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('news') }}'><i class='nav-icon la la-newspaper-o'></i> News</a></li> -->
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('contract') }}'><i class='nav-icon la la-address-book'></i> Contracts</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('customer') }}'><i class='nav-icon la la-glasses'></i> Customers</a></li>
{{-- @endrole --}}
{{-- @endif --}}
{{-- <li class="nav-title">Analysis</li> --}}

<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('test') }}'><i class='nav-icon la la-question'></i> Tests</a></li> -->