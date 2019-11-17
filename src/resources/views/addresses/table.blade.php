
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ Translate::recursive('portfolio::members.street') }}</th>
                    <th>{{ Translate::recursive('portfolio::members.city') }}</th>
                    <th>{{ Translate::recursive('portfolio::members.country') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $addresses as $address )
                <tr>
                    <td>{{ $address->id }}</td>
                    <td>{!! HTML::linkRoute('admin.addresses.show', $address->present()->street, array($address->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.addresses.show', $address->city, array($address->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.addresses.show', $address->country, array($address->id)) !!}</td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::iconRoute('admin.addresses.edit', Translate::recursive('common.edit'), 'edit', array($address->id), array('class' => 'btn btn-actions pull-left')) !!}</li>
                                <li>{!! HTML::iconRoute('admin.addresses.show', Translate::recursive('common.delete'), 'trash', array($address->id, '_token' => csrf_token()), array('class' => 'btn btn-actions pull-left rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $addresses->render() !!}
    </div>
