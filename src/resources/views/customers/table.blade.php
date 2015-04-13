
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ Translate::recursive('members.name') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $customers as $customer )
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>
                        {!! HTML::iconRoute('admin.customers.show', '', $customer->object->present()->segmentIcon, array($customer->id)) !!}
                        {!! HTML::linkRoute('admin.customers.show', $customer->object->present()->fullName, array($customer->id)) !!}
                    </td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::linkRoute('admin.customers.edit', Translate::recursive('common.edit'), array($customer->id), array('class' => 'btn btn-actions')) !!}</li>
                                <li>{!! HTML::linkRoute('admin.customers.show', Translate::recursive('common.delete'), array($customer->id, '_token' => csrf_token()), array('class' => 'btn btn-actions rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $customers->render() !!}
    </div>