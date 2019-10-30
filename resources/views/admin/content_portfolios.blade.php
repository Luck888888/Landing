<div style="margin:0px 50px 0px 50px;">

    @if($portfolio)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Фильтр</th>
                <th>Дата создания</th>

                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($portfolio as $k => $portfolios)

                <tr>

                    <td>{{ $portfolios->id }}</td>
                    <td>{!! Html::link(route('portfolioEdit',['portfolio'=>$portfolios->id]),$portfolios->name,['alt'=>$portfolios->name]) !!}</td>
                    <td>{{ $portfolios->filter }}</td>
                    <td>{{ $portfolios->created_at }}</td>

                    <td>
                        {!! Form::open(['url'=>route('portfolioEdit',['portfolio'=>$portfolios->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
    @endif

    {!! Html::link(route('portfolioAdd'),'Новое портфолио') !!}

</div>