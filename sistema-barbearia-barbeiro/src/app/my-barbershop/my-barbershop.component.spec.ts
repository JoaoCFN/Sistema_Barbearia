import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MyBarbershopComponent } from './my-barbershop.component';

describe('MyBarbershopComponent', () => {
  let component: MyBarbershopComponent;
  let fixture: ComponentFixture<MyBarbershopComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MyBarbershopComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MyBarbershopComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
