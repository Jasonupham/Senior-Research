package biz.dtails.jason.dtailsllc;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

/**
 * Created by Jason on 4/18/2016.
 */
public class Reservations  extends Activity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.reservations);

        String revTime1 = getIntent().getStringExtra("RevTime1");
        TextView tv =(TextView)findViewById(R.id.TVrev1);
        tv.setText(revTime1);

        String revTime2 = getIntent().getStringExtra("RevTime2");
        TextView tv2 =(TextView)findViewById(R.id.TVrev2);
        tv2.setText(revTime2);
    }
    public void onButtonClick(View v) {
        Intent i = new Intent(Reservations.this, LoginMain.class);
        startActivity(i);
    }
}