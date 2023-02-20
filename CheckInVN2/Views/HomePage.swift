//
//  ContentView.swift
//  Fashion
//
//  Created by Omair Siddiqui on 08/01/21.
//

import SwiftUI

struct HomePage: View {
    @State private var isMenuShowing = false
    var body: some View {
        
        NavigationView {
            
            VStack(spacing: 15) {
                
                ZStack {
                    
                    Text("CKVN").font(.title)
                    
                    HStack(spacing: 18) {
                        Button(action: {
                            
                        }) {
                            
                            Image("Menu").renderingMode(.original)
                            
                        }
                        
                        Spacer()
                        
                        Button(action: {
                           
                        }) {
                            NavigationLink(
                                destination: SearchBox(id_province: 1),
                                label: {
                                    Image("search").renderingMode(.original)
                                })
                            
                            
                        }
                    
                        
                    }
                    
                }.background(Color.white)
                .padding([.leading, .trailing, .top], 15)
                
               MainView()
                    
            }.navigationBarBackButtonHidden(true)
            .navigationBarTitle("")
            .navigationBarHidden(true)
            
        }
        
    }
    
}


struct HomePage_Previews: PreviewProvider {
    static var previews: some View {
        HomePage()
    }
}

struct MainView : View {
    
    @State var selected = "Dress"
    
    var body: some View {
        
        VStack(spacing: 15) {
            
            HStack {
                
                HStack {
                    
                    Button(action: {
                        
                    }) {
                        
                        HStack {
                            
                            NavigationLink(
                                destination: ProvinceView() ,
                                label: {
                                    Text("Tỉnh thành")
                                })
                                .navigationBarHidden(true)
                                .navigationBarTitleDisplayMode(.inline)
                            Spacer()
                            
                            Image("down")
                            
                        }.padding()
                        
                    }.foregroundColor(.black)
                    .background(Color.white)
                    
                    Button(action: {
                        
                    }) {
                        
                        Image("filter").renderingMode(.original).padding()
                        
                    }.background(Color.white)
                    
                }
                
            }
            
            HStack {
                
                ForEach(types, id: \.self) { i in
                    
                    HStack {
                        
                        Button(action: {
                            
                            self.selected = i
                            
                        }) {
                            
                            Text(i).padding()
                            
                        }
                        .foregroundColor(self.selected == i ? .white : .black)
                        .background(self.selected == i ? Color.black : Color.clear)
                        .cornerRadius(10)
                        
                        Spacer(minLength: 0)
                        
                    }
                    
                }
                
            }
            
            DetailsScroll()
            
        }.padding()
        .background(Color("Color"))
        .animation(.spring())
        
    }
    
}

struct DetailsScroll : View {
    @StateObject var FamousModel = ViewModel()
    var columns = [GridItem(.adaptive(minimum: 160), spacing: 20)]
    @State var show = false
    var body : some View {
        NavigationView {
                    ScrollView {
                        LazyVGrid(columns: columns, spacing: 20) {
                            ForEach(FamousModel.coorFamous, id: \.id) { famous in
                                CardImage(famousPlace: famous)
                                    .navigationTitle(Text("Địa danh"))
                                    .toolbar {
                                       NavigationLink(
                                        destination: FamousPlaceDetail(famousPlace: famous),
                                        label: {
                                            Text("Chi tiết")
                                        })
                                    }
                            }
                        }
                        .padding()
                    }
           
                }
                .navigationViewStyle(StackNavigationViewStyle())
                .onAppear{
                    FamousModel.fetchFamous()
                }
            }
}

struct Cards : View {
    var famousplace: Famous
    @State var show = false
    
    var body: some View {
        
        VStack(spacing: 8) {
            
            NavigationLink(
                destination: FamousPlaceDetail(famousPlace: famousplace),
                isActive: $show) {
                
                famousplace.imageName
                    .resizable().frame(width: UIScreen.main.bounds.width / 2 - 25,
                                                 height: 240)
                
            }
            
            HStack {
                
                VStack(alignment: .leading, spacing: 10) {
                    
                    Text(famousplace.name).fontWeight(/*@START_MENU_TOKEN@*/.bold/*@END_MENU_TOKEN@*/)
                    Text(famousplace.description)
                    
                }
                
                Spacer()
                
                Button(action: {
                    
                }) {
                    
                    Image("option").renderingMode(.original)
                    
                }.padding(.trailing, 15)
                
            }
        }
        
    }
    
}

struct DetailView : View {
    
    @Binding var show : Bool
    @State var size = ""
    
    var body: some View {
        
        VStack(spacing: 0) {
            
            HStack(spacing: 18) {
                
                Button(action: {
                    
                    self.show.toggle()
                    
                }) {
                    
                    Image("Back").renderingMode(.original)
                    
                }
                
                Spacer()
                
                Button(action: {
                    
                }) {
                    
                    Image("search").renderingMode(.original)
                    
                }
            
                
            }.navigationBarTitle("")
            .navigationBarHidden(true)
            .navigationBarBackButtonHidden(true)
            .padding(15)
            
            Image("img").resizable()
            
            VStack(alignment: .leading, spacing: 15) {
                
                HStack {
                    
                    VStack(alignment: .leading, spacing: 8) {
                        
                        Text("Summer").font(.largeTitle)
                        Text("$160").fontWeight(.heavy)
                        
                    }
                    
                    Spacer()
                
                }
                
                Text("Fitted top made from a polyamide blend. Features wide straps and chest reinforcement.")
                
                Text("Select Size")
                
                HStack {
                    
                    Button(action: {
                        
                    }) {
                        
                        Text("Yêu thích").padding().border(Color.black, width: 1.4)
                        
                    }.foregroundColor(.black)
                    
                    Spacer()
                    
                    Button(action: {
                        
                    }) {
                        
                        Text("Xem thêm").padding()
                        
                    }.foregroundColor(.white)
                    .background(Color.black)
                    .cornerRadius(10)
                    
                }.padding([.leading,.trailing], 15)
                .padding(.top, 15)
                
            }.padding()
            .background(rounded().fill(Color.white))
            .padding(.top, -50)
            
        }
        
    }
    
}

struct rounded : Shape {
    
    func path(in rect: CGRect) -> Path {
        
        let path = UIBezierPath(roundedRect: rect,
                                byRoundingCorners: [.topLeft, .topRight],
                                cornerRadii: CGSize(width: 35, height: 35))
        
        return Path(path.cgPath)
    }
    
}

struct MenuView: View {
    @Binding var isMenuShowing: Bool

    var body: some View {
        VStack {
            Text("Menu Content")
                .font(.largeTitle)
                .foregroundColor(.white)
                .padding()

            Spacer()

            Button(action: {
                isMenuShowing.toggle()
            }, label: {
                Text("Close Menu")
                    .font(.title)
                    .foregroundColor(.white)
                    .padding()
            })
        }
        .background(Color.black.opacity(0.5))
    }
}

struct type : Identifiable {
    
    var id : Int
    var rows : [row]
    
}

struct row : Identifiable {
    
    var id : Int
    var name : String
    var price : String
    var image : String
    
}

// Sample data has already been created

var sizes = ["S","M","X","XL"]

var types = ["Top","HOT","Travle"]

var coordinates = Famous.Coordinates(latitude: 37.7749, longitude: -122.4194)
var famousplace = Famous(id: 1, id_provice: 2, name: "San Francisco", description: "City by the Bay",address: "test" , image: "angiang", ischecked: 0, coordinates: coordinates)
